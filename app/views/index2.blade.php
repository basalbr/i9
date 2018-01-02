@extends('layouts.master')
@section('page_description')
BEM VINDO A I9 GESTÃO EMPRESARIAL
@stop
@section('content')
<section id='quem-somos'>
    <div class='container-fluid bg-white'>
        <div class='box'>
            <h2>Quem Somos</h2>
            
        </div>
        <div class='container'>
            <div class='col-xs-12'>
                {{$quem_somos->descricao}}
            </div>
        </div>
    </div>
</section>

<section id='servicos'>
    <div class='container-fluid bg-white'>
        <div class='box'>
            <h2>Serviços</h2>
            
        </div>
        <div class='container'>
            {{$servicos->descricao}}
        </div>
    </div>
</section>
<section id='noticias'>
    <div class='container-fluid bg-white'>
        <div class='box'>
            <h2>Notícias</h2>
            
        </div>
        <div class='container'>
            @if(count($noticias) > 0)
            @foreach ($noticias as $index => $noticia)
            <div class='col-md-4'>
                <div class="noticia-item">
                    <a href="{{URL::action('NoticiasController@ler', [$noticia->id,  \Str::slug($noticia->nome)])}}">
                        <div class="noticia-item-img">
                            {{ HTML::image('uploads/'.$noticia->thumb) }}
                        </div>
                        <div class="noticia-item-titulo">{{ Str::limit($noticia->nome, 50) }}</div>
                    </a>
                </div>
            </div>
            @endforeach
            <div class="col-xs-12 text-center">
                <a href="{{url('/noticias')}}" id="todas-noticias">VER TODAS AS NOTÍCIAS</a>                
            </div>
            @endif
        </div>
    </div>
</section>
<section id='parceiros' class='hidden-xs hidden-sm'>
    <div class='container-fluid bg-ltblue'>
        <div class='box'>
            <h2>Parceiros</h2>
            
        </div>
        @if(count($parceiros))
        <div id="parceiros-carousel" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner hidden-xs" role="listbox">
                <?php $cnt = 1; $arrayKeys = array_keys($parceiros->toArray()); $lastElementKey = array_pop($arrayKeys);?>
                @foreach($parceiros as $p => $parceiro)
                @if($cnt == 1 || $p == 0)
                <div class="item {{$p == 0 ? 'active' : ''}} hidden-xs">
                    <div class="container">
                        @endif
                        <div class="col-md-2">
                            <div class="parceiro-item">
                                <a href="{{$parceiro->url}}" target="_blank">
                                    <img src="{{url('uploads/'.$parceiro->imagem)}}" alt="{{$parceiro->nome}}" title="{{$parceiro->nome}}">
                                </a>
                            </div>
                        </div>
                        @if($cnt/3 == 2 || $lastElementKey == $p)
                    </div>
                </div>
                <?php $cnt = 1; ?>
                @else
                <?php $cnt++; ?>
                @endif
                @endforeach
				
            </div>
			
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#parceiros-carousel" role="button" data-slide="prev">
                <span class="fa fa-angle-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#parceiros-carousel" role="button" data-slide="next">
                <span class="fa fa-angle-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        @endif
    </div>
</section>
@stop