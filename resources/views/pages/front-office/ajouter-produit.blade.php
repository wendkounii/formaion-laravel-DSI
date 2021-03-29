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
            <form action="{{route("enregistrer.produit")}}" method="post">
                @method("POST")
                @csrf
                <div class="form-group">
                  <label for="">Désignation</label>
                  <input value="{{ old('designation') }}" type="text" name="designation" id="" class="form-control" placeholder="" aria-describedby="helpId">
                  @error('designation')
                  <small class="tex-danger"> {{$message}}</small>                      
                  @enderror
                  <!--  <small id="helpId" class="text-muted">Help text</small> mettre du texte descriptif-->
                </div>
               
                <div class="form-group">
                   <label for="">Description</label>
                   <input value="{{ old('description') }}" type="text" name="description" id="" class="form-control" placeholder="" aria-describedby="helpId">
                  @error('description')
                     <small class="tex-danger"> {{$message}}</small>                      
                  @enderror
                   <!--  <small id="helpId" class="text-muted">Help text</small> mettre du texte descriptif-->
                 </div>
             
                <div class="form-group">
                      <label for="">Prix</label>
                      <input value="{{ old('prix') }}" type="number" name="prix" id="" class="form-control" placeholder="" aria-describedby="helpId">
                      @error('prix')
                      <small class="tex-danger"> {{$message}}</small>                      
                      @enderror
                      <!--  <small id="helpId" class="text-muted">Help text</small> mettre du texte descriptif-->
                </div>  
                
                <div class="form-group">
                    <label for="">Like</label>
                    <input value="{{ old('like') }}" type="number" name="like" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    @error('like')
                       <small class="tex-danger"> {{$message}}</small>                      
                    @enderror
                    <!--  <small id="helpId" class="text-muted">Help text</small> mettre du texte descriptif-->
                </div>
                
                <div class="form-group">
                    <label for="">Poids</label>
                    <input value="{{ old('poids') }}" type="number" name="poids" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    @error('poids')
                         <small class="tex-danger"> {{$message}}</small>                      
                    @enderror
                    
                    <!--  <small id="helpId" class="text-muted">Help text</small> mettre du texte descriptif-->
                </div>
                
                <div class="form-group">
                  <label for=""> Pays source</label>
                  <select class="form-control" name="pays_source" id="">
                    <option value="Burkina Faso" {{ old('pays_source')=='Burkina' ? "selected": '' }}>Burkina Faso </option>
                    <option value="Sénégale" {{ old('pays_source')=='Sénégal' ? "selected": '' }}>Sénégal</option>
                    <option value="Mali" {{ old('pays_source')=='Mali' ? "selected": '' }}>Mali</option>
                  </select>
                  @error('pays_source')
                      <small class="tex-danger"> {{$message}}</small>            
                  @enderror
                </div>
                
                <button type="submit" class="btn btn-success btn-block btn-lg ">Valider</button>
                
              </form>
        </div>
         
    </div>
</div>
<br>
</x-master-layout>