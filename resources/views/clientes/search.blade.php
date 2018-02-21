

{!!Form::model(Request::all(),['url'=>'persona','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
				
				 <div class="form-group">
				 
 			 		{!!Form::select('cartera',$carteras,null,['class'=>'form-control'])!!}
 			 	
 			  	</div>
				  <button type="submit" class="btn btn-default">Buscar!!</button>
			
			
{!!Form::close()!!}