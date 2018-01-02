<?php

use Illuminate\Pagination\BootstrapPresenter;

class CustomPresenter extends BootstrapPresenter {

    protected function getPageSlider() {
        // Changing the original value from 6 to 3 to reduce the link count
        $window = 3;

        // If the current page is very close to the beginning of the page range, we will
        // just render the beginning of the page range, followed by the last 2 of the
        // links in this list, since we will not have room to create a full slider.
        if ($this->currentPage <= $window) {

            return $this->getPageRange(1, $window + 2);
        }

        // If the current page is close to the ending of the page range we will just get
        // this first couple pages, followed by a larger window of these ending pages
        // since we're too close to the end of the list to create a full on slider.
        elseif ($this->currentPage >= $this->lastPage - $window) {
            $start = $this->lastPage - 4;

            $content = $this->getPageRange($start, $this->lastPage);

            return $content;
        }

        // If we have enough room on both sides of the current page to build a slider we
        // will surround it with both the beginning and ending caps, with this window
        // of pages in the middle providing a Google style sliding paginator setup.
        else {
            $content = $this->getAdjacentRange();

            return $content;
        }
    }

    public function getAdjacentRange() {
        return $this->getPageRange($this->currentPage - 2, $this->currentPage + 2);
    }
    public function getPrevious($text = '<')
	{
		// If the current page is less than or equal to one, it means we can't go any
		// further back in the pages, so we will render a disabled previous button
		// when that is the case. Otherwise, we will give it an active "status".
		if ($this->currentPage <= 1)
		{
			return $this->getDisabledTextWrapper($text);
		}

		$url = $this->paginator->getUrl($this->currentPage - 1);

		return $this->getPageLinkWrapper($url, $text, 'prev');
	}

	/**
	 * Get the next page pagination element.
	 *
	 * @param  string  $text
	 * @return string
	 */
	public function getNext($text = '>')
	{
		// If the current page is greater than or equal to the last page, it means we
		// can't go any further into the pages, as we're already on this last page
		// that is available, so we will make it the "next" link style disabled.
		if ($this->currentPage >= $this->lastPage)
		{
			return $this->getDisabledTextWrapper($text);
		}

		$url = $this->paginator->getUrl($this->currentPage + 1);

		return $this->getPageLinkWrapper($url, $text, 'next');
	}

}

?>