@extends('admin.layoutAdmin')
@section('admincontent')
<!--<a href={{route('admin.admin.parking.create',["admin"=>$admin])}}>antoi</a>-->
<div id="a">
    <h1>Bienvenue {{$A->username}} </h1>
</div>
<div class="section">
    <div class="block">
        @if($p)
        @foreach($p as $o)
        <div class="block1">
            <div class="b1">
                <div>
                    <h5>Nombre de parking | </h5>
                    <div>
                        <img src={{asset('asset/tomo.png')}} alt="sary"  height="64px">
                        <div>
                        <h6>{{$o->nombre_parking}}</h6>
                        <span class="text-muted small pt-2 ps-1">Cet indicateur indique le nombre de parking effectué par un utilisateur</span>
                        </div>
                    </div>
                </div>
                <div>
                   
                    <h5>Nombre de revenue | </h5>
                    <div>
                        <img src={{asset('asset/money.png')}} alt="sary" width="64px" height="64px" style="border-radius:100%;background-color:#ffecdf;color:#ff771d">
                        <div>
                            @if($nombre_de_revenue) <h6>{{$nombre_de_revenue}}$</h6>
                            @else<h6>0$</h6>
                            @endif
                            <span class="text-muted small pt-2 ps-1">Cet indicateur indique le montant total des revenus</span>
                            </div>
                    </div>
                </div>
            </div>
            <div class="b2">
                <div>
                    <h5>Nombre de client | </h5>
                    <div>
                        <img src={{asset('asset/customer.png')}} alt="sary" width="54px" height="54px" style="border-radius:100%;background-color:#ffecdf;color:#ff771d">
                        <div>
                        <h6>{{$o->nombre_client}}</h6>
                        <span class="text-muted small pt-2 ps-1">Cet indicateur indique le nombre de client  qui ont utilisé le parking</span>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
        @endforeach
        <div class="block2">
                <div>
                    <img src={{asset('asset/voloany.gif')}}>
                    <div>
                        <p class="text-center" style="color: #012970;
                        font-weight: 900;font-size:20px">Ce tableau de bord fournit une vue d'ensemble des performances de l'entreprise</p>
                    </div>
                </div>
        </div>
    </div>
    @endif
</div>
@endsection