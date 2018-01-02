<?php

class Newsletter extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'newsletter';

    function isValid($email)
    {
        $existe = Newsletter::where('email', $email)->first();
        if($existe instanceof Newsletter){
            return false;
        }
        return true;
    }

}
