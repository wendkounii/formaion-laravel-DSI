<x-master-layout>
<br>
<div class="container">
    <div class="row">
        
  <!--  </div>
    <div class="row">-->
        <div class="col-md-8 offset-md-2">
            @if (session('enregistrerproduit'))
                
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                {{session('enregistrerproduit')}}
            </div>
            @endif
            <h1>  Ajouter un nouveau produit! </h1>
            <form action="{{route("enregistrer.produit")}}" method="post" enctype="multipart/form-data">
              @method("POST")
              @csrf
            @include("partials._produit-form", ["btnTexte"=>"Ajouter"])
          </form>
     </div>
         
    </div>
</div>
<br>
</x-master-layout>