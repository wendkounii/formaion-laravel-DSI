<x-master-layout>
   
   <br>
   
    <div class="container">
       <div class="row">
           <div class="col-md-6">
            <h3>Liste de produits</h3>

            @if (session('produit'))
                
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    {{session('produit')}}
                </div>
            @endif
            @if (session('ajoutcommande'))
                
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                {{session('ajoutcommande')}}
            </div>
        @endif
        <div class="row">
            <d-flex>
                @if(Auth::user()!=null && Auth::user()->isAdmin())
                <a href="{{route('excel.export')}}"  > 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 25px;" class="text-info">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                      </svg>
                </a>
        
        
                <a href="{{route('ajouter.produit')}}"  > 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" style="width: 25px;" class="bi bi-pencil-square text-primary" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg>
                </a>   
                @endif 
            </d-flex>
        </div>
       
            @if ($produit->count()>0)
                <table class="table table-hover">
                    <theader>
                        <tr>
                            <td>Désignation</td>
                            <td>Prix</td>
                            <td>Pays d'origine</td>
                            <td>Pays Action</td>
                            
                        </tr>
                    </theader>
                    <tbody>
                     @foreach ($produit as $produits)
                     <tr>
                        {{-- <td> <img class="" src={{ asset('storage/produits-imagess/'.$produit->image) }}" alt=""> </td> --}}
                        {{-- <image class="" src={{asset('storage/produits-imagess/'.$produit->image) }}" alt="">  --}}
                        <td> <img class="" src="{{ asset('storage/produits-images/'.$produits->image) }}" style="width: 25px;" alt=""> {{$produits->designation}}</td>
                        <td>{{$produits->prix}}</td>
                        <td>{{$produits->pays_source}}</td>
                        <td> 
                            <div class="d-flex">
                                   {{-- <a href="{{route('supprimer.produit', $produits->id)}}" class="mr-2" >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="width: 25px;" viewBox="0 0 24 24" stroke="currentColor" class="text-danger">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg> 
                                    </a> --}}

                                   


                                    <form id="{{'produitItem'.$produits->id}}"
                                          action="{{route('supprimer.produit',$produits->id)}}"
                                          method="GET" style="display: nome;">
                                          @csrf
                                    </form>
        
                                    <a href="{{route('ajouter.commande', $produits->id)}}"  > 
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="width: 25px;" viewBox="0 0 24 24" stroke="currentColor" class="text-success">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </a>

                                    @if(Auth::user()!=null && Auth::user()->isAdmin()))
                                    <a href="{{route('modifie.produit', $produits->id)}}"  > 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" style="width: 25px;" class="bi bi-pencil-square text-primary" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                          </svg>
                                    </a>

                                    <a href="#" class="mr-2" onclick="deleteConfirm('{{'produitItem'.$produits->id}}')" >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="width: 25px;" viewBox="0 0 24 24" stroke="currentColor" class="text-danger">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg> 
                                    </a>
                                    @endif
                                   
                            </div>
                           
                        </td>
                     </tr>
                     @endforeach
                        
                 </tbody>
                </table >
                {{$produit->links()}}
            @else
                <p>
                    Aucun produit n'a été trouvé
                </p>
            @endif
           </div>
               
           <div class="col-md-6">
            <h3>Liste de commandes</h3>
            @if (session('commande'))
                
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    {{session('commande')}}
                </div>
            @endif
           
            @if ($lescommandes->count()>0)
                <table class="table table-hover">
                    <theader>
                        <tr>
                            <td>Désignation</td>
                            <td>Prix</td>
                            <td>Pays d'origine</td>
                            <td>Pays Action</td>
                            
                        </tr>
                    </theader>
                    <tbody>
                     @foreach ($lescommandes as $commande)
                     <tr>
                       
                        <td>{{$commande->uuid}}</td>
                        <td>{{$commande->id_produit}}</td>
                        <td>{{$commande->uuid_produit}}</td>
                        <td> 
                            <div class="d-flex">
                                <a href="{{route('supprimer.commande', $commande->id)}}" >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="max-width:25px;" viewBox="0 0 24 24" stroke="currentColor" class="text-danger">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg> 
                                </a>           
                            </div>
                        </td>
                     </tr>
                     @endforeach
                        
                 </tbody>
                </table >
                {{$lescommandes->links()}}
            @else
                <p>
                    Aucune commande n'a été trouvé
                </p>
            @endif
           </div>
       </div>
   </div>
       
</x-master-layout>