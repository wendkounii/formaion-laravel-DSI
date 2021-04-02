<x-master-layout>
<br>
<div class="container">
    <div class="row">
        
  <!--  </div>
    <div class="row">-->
        <div class="col-md-8 offset-md-2">
            @if (session('modifierproduit'))
                
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                {{session('modifierproduit')}}
            </div>
            @endif
            <h1>  Modifier un produit! </h1>
            <form action="{{route('update.produit',$produit->id)}}" method="post">
              @method("PUT")
              @csrf
          
            @include("partials._produit-form", ["btnTexte"=>"Modifier"])
          </form>
       </div>
         
    </div>
</div>
<br>
</x-master-layout>