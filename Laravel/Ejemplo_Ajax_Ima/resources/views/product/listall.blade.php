   <table class="table table-bordered">
               <thead>
                  <th>Nombre</th>
                  <th>Precio</th>
                  <th>Marca</th>
                  <th>Imagen</th>
                  <th>Acción</th>
               </thead>
               <tbody>

                @foreach($producto as $product)

                
                  <tr>
                    <!-- Sin el alias que le agrego al campo <td>{{$product->name}}</td>-->
                     <td>{{$product->product}}</td>
                      <td>{{$product->price}}</td>
                    <td>{{$product->mark}}</td>
                      <td><a href="{{url('photo',$product->id)}}"><img src="images/products/{{$product->image}}" alt="" style="width: 30px;height: 44px;">[Editar]</a></td>        
                      
                     <td><a href="{{route('producto.edit',$product->id)}}">Editar</a>  <!-- A la dirección product.edit le vamos a enviar el id del producto-->
                    <a href="{{route('producto.show',$product->id)}}">Eliminar</a></td>
                  </tr>

                  @endforeach()
               </tbody>


             </table>
             
             <div class="text-center">
               {{ $producto->links() }}
             </div>