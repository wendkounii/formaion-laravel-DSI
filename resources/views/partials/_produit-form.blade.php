
    <div class="form-group">
      <label for="">Désignation</label>
      <input value="{{ $produit->designation }}" type="text" name="designation" id="" class="form-control" placeholder="" aria-describedby="helpId">
      @error('designation')
      <small class="text-danger"> {{$message}}</small>                      
      @enderror
      <!--  <small id="helpId" class="text-muted">Help text</small> mettre du texte descriptif-->
    </div>
   
    <div class="form-group">
       <label for="">Description</label>
       <input value="{{ $produit->description }}" type="text" name="description" id="" class="form-control" placeholder="" aria-describedby="helpId">
      @error('description')
         <small class="text-danger"> {{$message}}</small>                      
      @enderror
       <!--  <small id="helpId" class="text-muted">Help text</small> mettre du texte descriptif-->
     </div>
 
    <div class="form-group">
          <label for="">Prix</label>
          <input value="{{ $produit->prix }}" type="number" name="prix" id="" class="form-control" placeholder="" aria-describedby="helpId">
          @error('prix')
          <small class="text-danger"> {{$message}}</small>                      
          @enderror
          <!--  <small id="helpId" class="text-muted">Help text</small> mettre du texte descriptif-->
    </div>  
    
    <div class="form-group">
        <label for="">Like</label>
        <input value="{{ $produit->like }}" type="number" name="like" id="" class="form-control" placeholder="" aria-describedby="helpId">
        @error('like')
           <small class="text-danger"> {{$message}}</small>                      
        @enderror
        <!--  <small id="helpId" class="text-muted">Help text</small> mettre du texte descriptif-->
    </div>
    
    <div class="form-group">
        <label for="">Poids</label>
        <input value="{{ $produit->poids }}" type="number" name="poids" id="" class="form-control" placeholder="" aria-describedby="helpId">
        @error('poids')
             <small class="text-danger"> {{$message}}</small>                      
        @enderror
        
        <!--  <small id="helpId" class="text-muted">Help text</small> mettre du texte descriptif-->
    </div>
    
    <div class="form-group">
      <label for=""> Pays source</label>
      <select class="form-control" name="pays_source" id="">
        <option value="{{$produit->pays_source}}" selected>{{$produit->pays_source}}</option>
        <option value="Burkina Faso" {{ old('pays_source')=='Burkina' ? "selected": '' }}>Burkina Faso </option>
        <option value="Sénégale" {{ old('pays_source')=='Sénégal' ? "selected": '' }}>Sénégal</option>
        <option value="Mali" {{ old('pays_source')=='Mali' ? "selected": '' }}>Mali</option>
      </select>
      @error('pays_source')
          <small class="tex-danger"> {{$message}}</small>            
      @enderror
    </div>
   <div class="custom-file mb-5 mt-4">
    <input id="image" type="file" name="image" class="">
    {{-- <label class="custom-file-label" for="image">Image</label> --}}
    @error('image')
        <small class="text-danger"> {{$message}}</small>

    @enderror
   </div>
   
    
    <button type="submit" class="btn btn-success btn-block btn-lg ">{{$btnTexte}}</button>
    
 
