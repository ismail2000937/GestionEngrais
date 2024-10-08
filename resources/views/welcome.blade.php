@extends('layouts.app')

@section('content')
@include('boots')
    <section class="bg-light" style="padding-top: 60px;">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <h1><strong>Bienvenue sur FertiCheck </strong></h1>
                    <p>FertiCheck c'est une application d'analyse de la qualité des engrais ! Nous offrons une solution
                        complète pour les analystes et les utilisateurs afin de collecter et de visualiser les données de
                        composition des produits en temps réel.</p>
                </div>
                <div class="col-md-6">
                    <video src="images/vid1.mp4" loop muted autoplay></video>
                </div>
            </div>
        </div>
    </section>


    <!-- Section des cartes de produits -->
    <section>
        <div class="container py-5">
            <h2>Nos analyses sur ces produits populaires</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/tsp1.jpg" alt="Image du produit 1" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">TSP</h5>
                            <p class="card-text">(Triple Super Phosphate) est produit à partir de phosphate de roche, qui
                                est traité avec de l'acide sulfurique pour produire de l'acide phosphorique. L'acide
                                phosphorique est ensuite mélangé avec de la craie ou de la chaux pour former du TSP.
                                L'engrais résultant contient généralement environ 46% de phosphore.</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/dap1.jpg" alt="Image du produit 2" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">DAP</h5>
                            <p class="card-text">(Diammonium Phosphate) est un type d'engrais granulaire qui contient des
                                nutriments essentiels pour la croissance des plantes, tels que l'azote et le phosphore. Il
                                est considéré comme un engrais "complet" car il contient ces deux éléments nutritifs dans
                                des proportions équilibrées.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/map1.jpg" alt="Image du produit 3" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">MAP</h5>
                            <p class="card-text">(Monammonium Phosphate) est un type d'engrais granulaire qui contient
                                l'acide phosphorique et d'ammoniac, qui sont mélangés pour former du monammonium phosphate.
                                L'engrais résultant contient généralement environ 11% d'azote et 52% de phosphore. </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>

    <!-- Liens vers les fichiers Bootstrap JavaScript -->
    <div id="foot">
        @include('footer')
    </div>

    </html>
@endsection
