
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
//Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

const cartera = new Vue({
    el: '#cartera',
   	created: function() {
		this.getCartera();
	},
	data:{
		carteras:[],
		newCartera:'',
		errors:[],
		fillCartera:{
			'id':'', 
			'nombre':''
		}
	},	
	
	methods: {
		getCartera: function() {
			var urlCartera = 'cartera';
			axios.get(urlCartera).then(response => {
				this.carteras = response.data
				
			});
		},
		editCartera: function(cartera) {

			this.fillCartera.id= cartera.id;
			this.fillCartera.nombre=cartera.nombre;
			$('#edit').modal('show');

		},
		UpdateCartera:function(id) {
			var url = 'cartera/' + id;
			axios.put(url,this.fillCartera).then(response=>{

				this.getCartera();
				this.fillCartera={'id':'', 'nombre':''};
				this.errors=[];

				$('#edit').modal('hide');
				toastr.success('Cartera Actualizada Correctamente');
			}).catch(error=>{
				this.errors = error.response.data;
			});

		},
		deleteCartera:function(cartera){
			var urlDelete ='cartera/' + cartera.id
			axios.delete(urlDelete).then(response=>{
				this.getCartera();  
				toastr.success('Eliminado correctamente');
			});
			
		},
		createCartera:function(){

			var urlCreateCartera='cartera'
			axios.post(urlCreateCartera,{

				nombre: this.newCartera

			}).then(response=>{

				this.getCartera();
				this.newCartera='';
				this.errors=[]; 
				$('#create').modal('hide');
				toastr.success('Guardado Correctamente'); 
			}).catch(error =>{
				this.errors=error.response.data
			});

		},	
	}

});

const cobrador = new Vue({
    el: '#cobrador',
   	created: function() {
		this.getCobrador();
	},
	data:{
		cobradores:[],
		id:'',	
		nombre:'',
		cedula:'',
		
		celular:'',
		direccion:'',
		role:'',
		errors:[],
		fillCobrador:{
			'id':'', 
			'nombre':'',
			'cedula':'',
			'celular':'',
			'direccion':'',
			
			carteras:[],
		
		}
	},	
	
	methods: {
		getCobrador: function() {
			var urlCobrador = 'persona/cobrador';
			axios.get(urlCobrador).then(response => {
				this.cobradores = response.data
				
			});
		},
		editCobrador: function(cobrador) {

			this.fillCobrador.id= cobrador.id;
			this.fillCobrador.nombre=cobrador.nombre;
			this.fillCobrador.cedula=cobrador.cedula;
			this.fillCobrador.celular=cobrador.celular;
			this.fillCobrador.direccion=cobrador.direccion;
			
			this.fillCobrador.carteras=[$(".carteras").val()]
			$('#edit').modal('show');
			$('#error').empty();

		},
	
		UpdateCobrador:function(id) {
			var url = 'persona/' + id;
			axios.put(url,this.fillCobrador).then(response=>{

				this.getCobrador();
				this.fillCobrador={'id':'', 'nombre':''};
				this.errors=[];
				$('#edit').modal('hide');
				toastr.success('cobrador Actualizada Correctamente');
			}).catch(error=>{
				this.errors = error.response.data;
			});

		},
		deleteCobrador:function(id){
			var urlDelete ='persona/' + id;
			axios.delete(urlDelete).then(response=>{
				this.getCobrador();  
				toastr.success('Cobrador eliminado correctamente');
			});
			
		},
		createCobrador:function(){

			var url='persona'
			axios.post(url,{

				nombre: this.nombre,
				cedula: this.cedula,
				
				celular:this.celular,
				direccion:this.direccion,
				role:'cobrador',


			}).then(response=>{

				this.getCobrador();
				this.nombre='';
				this.cedula='';
				
				this.celular='';
				this.direccion='';
				this.errors=[]; 
				$('#create').modal('hide');
				$('#error').empty();
				toastr.success('Cobrador Guardado Correctamente'); 
			}).catch(error =>{
				this.errors=error.response
			});

		},	

	}

});

const cliente = new Vue({
    el: '#cliente',
   	created: function() {
		this.getCliente();
	},
	data:{
		clientes:[],
		nombre:'',
		cedula:'',
		
		celular:'',
		role:'',
		direccion:'',
		cobrador_id:'',
		estado:'',
		errors:[],
		fillcliente:{
			'id':'', 
			'nombre':'',
			'cedula':'',
			'celular':'',
			'direccion':'',
			
			'cobrador_id':'',
			'estado':'',

		}
	},	
	methods: {
		getCliente: function() {
			var urlcliente = '/persona/cliente';
			axios.get(urlcliente).then(response => {
				this.clientes = response.data
			});
		},
		editCliente: function(cliente) {

			this.fillcliente.id= cliente.id;
			this.fillcliente.nombre=cliente.nombre;
			this.fillcliente.cedula=cliente.cedula;
			this.fillcliente.celular=cliente.celular;
			this.fillcliente.direccion=cliente.direccion;
			
			this.fillcliente.estado=cliente.estado;
			
			
			this.fillcliente.cobrador_id=cliente.cobrador_id;
			$('#edit').modal('show');
			$('#error').empty();

		},
		updateCliente:function(id) {
			
			var url = 'persona/' + id;
			this.fillcliente.cobrador_id=$("#cobrador_id").val();
			axios.put(url,this.fillcliente).then(response=>{

				this.getCliente();
				fillcliente={
					'id':'', 
					'nombre':'',
					'cedula':'',
					'celular':'',
					'direccion':'',
					
					'cobrador_id':'',
					'estado':'',

				}
			this.errors=[];
				$('#edit').modal('hide');
				toastr.success('cliente Actualizada Correctamente');
			}).catch(error=>{
				this.errors = error.response.data;
			});

		},
		deleteCliente:function(cliente){
			var urlDelete ='persona/' + cliente.id
			axios.delete(urlDelete).then(response=>{
				this.getCliente();  
				toastr.success('Cliente eliminado correctamente');
			});
			
		},
		createCliente:function(){

			var url='persona'
			axios.post(url,{
				nombre: this.nombre,
				cedula: this.cedula,
				
				celular:this.celular,
				direccion:this.direccion,
				estado:this.estado,
				cobrador_id:$(".cobrador_id").val(),
				role:'cliente'

			}).then(response=>{

				this.getCliente();
				this.nombre='';
				this.cedula='';
				
				this.celular='';
				this.direccion='';
				this.cobrador_id='';
				this.estado='';
				this.errors=[]; 
				$('#create').modal('hide');
				$('#error').empty();
				toastr.success('cliente Guardado Correctamente'); 
			}).catch(error =>{
				this.errors=error.response.data
			});

		},	

	}

});

const gasto = new Vue({
    el: '#gasto',
   	created: function() {
		this.getGasto();
	},
	data:{
		gastos:[],
		detalle:'',
		valor:'',
		cartera_id:'',
		errors:[],
		fillgasto:{
			'detalle':'',
			'valor':'',
			'id':'',
			'cartera_id':'',
		}
	},	
	methods: {
		getGasto: function() {
			var url = 'gasto';
			axios.get(url).then(response => {
				this.gastos = response.data
			});
		},
		editGasto: function(gasto) {

	
			this.fillgasto.detalle=gasto.detalle;
			this.fillgasto.valor=gasto.valor;
			this.fillgasto.id=gasto.id;
			this.fillgasto.cartera_id=gasto.cartera_id;
			
			$('#edit').modal('show');
			$('#error').empty();

		},
		updateGasto:function(id) {
			var url = 'gasto/' + id;
			axios.put(url,this.fillgasto).then(response=>{

				this.getGasto();
				fillgasto={
					'id':'',
					'valor':'',
					'detalle':'',
					cartera_id:'',
					

				}
			this.errors=[];
				$('#edit').modal('hide');
				toastr.success('cliente Actualizada Correctamente');
			}).catch(error=>{
				this.errors = error.response.data;
			});

		},
		deleteGasto:function(gasto){
			var urlDelete ='gasto/' + gasto.id
			axios.delete(urlDelete).then(response=>{
				this.getGasto();  
				toastr.success('Gasto eliminado eliminado correctamente');
			});
			
		},
		createGasto:function(){

			var url='gasto'
			axios.post(url,{
				valor: this.valor,
				detalle: this.detalle,
				cartera_id: $(".cartera_id").val(),
				

			}).then(response=>{

				this.getGasto();
				this.valor='';
				this.detalle='';
				this.cartera_id='';
			
				this.errors=[]; 
				$('#create').modal('hide');
				$('#error').empty();
				toastr.success('Gasto Guardado Correctamente'); 
			}).catch(error =>{
				this.errors=error.response.data
			});

		},	

	}

});
var valor_a_pagar=0;
var cuota;

const prestamo = new Vue({
    el: '#prestamos',
   	created: function() {
		this.getPrestamo();

	},
	data:{
		prestamos:[],
		articulo:'',
		valor:'',
		cartera_id:'',
	
		cliente_id:'',
		estado:'',
		valor:'',
		valor_pagar:'',
		valor_seguro:'',
		valor_cuota:'',
		plazo:'',
		pago_domingos:'',
		

		errors:[],
		fillprestamo:{
			'articulo':'',
			'valor':'',
			'cartera_id':'',
			'valor_pagar':'',
			'cliente_id':'',
			'estado':'',
			'valor':'',
			'valor_seguro':'',
			'valor_cuota':'',
			'plazo':'',
			'pago_domingos':'',
			'id':''
		}
	},	
	methods: {
		getPrestamo: function() {
			var url = 'prestamo';
			axios.get(url).then(response => {
				this.prestamos = response.data
			});
		},
		editPrestamo: function(prestamo) {
	
			this.fillprestamo.articulo=prestamo.articulo;
			this.fillprestamo.valor=prestamo.valor;
			this.fillprestamo.estado=prestamo.estado;
			this.fillprestamo.valor_cuota=prestamo.valor_cuota;
			this.fillprestamo.valor_seguro=prestamo.valor_seguro;
			this.fillprestamo.plazo=prestamo.plazo;
			this.fillprestamo.pago_domingos=prestamo.pago_domingos;
			this.fillprestamo.cartera_id=prestamo.cartera_id;
			this.fillprestamo.cliente_id=prestamo.cliente_id;

			$('.fillprestamo.cliente_id option[value="'+prestamo.cliente_id+'"]').prop("selected","true");
			this.fillprestamo.id=prestamo.id;
			
			$('#edit').modal('show');
			$('#error').empty();
			$(".error").empty();

		},
		updatePrestamo:function(id) {
			var url = 'prestamo/' + id;
			this.fillprestamo.cartera_id=$("#cartera_id").val()
			this.fillprestamo.cliente_id=$("#cliente_id").val()
			axios.put(url,this.fillprestamo).then(response=>{

				this.getPrestamo();
				fillprestamo={
					'articulo':'',
					'valor':'',
					'cartera_id':'',
					
					'cliente_id':'',
					'estado':'',
					'valor':'',
					'valor_seguro':'',
					'valor_cuota':'',
					'plazo':'',
					'pago_domingos':'',	
					
				};
			this.errors=[];
			$(".error").empty();
			$('#edit').modal('hide');
			toastr.success('Prestamo Actualizada Correctamente');
			}).catch(error=>{
				this.errors = error.response.data;
			});

		 },
		deletePrestamo:function(prestamo){

			var urlDelete ='prestamo/' + prestamo.id
			
			axios.delete(urlDelete).then(response=>{
				this.getPrestamo();  
				toastr.success('Prestamo eliminado eliminado correctamente');
			});
			
		},
		buscar_admin:function(){
			var fecha = $("#fecha_admin").val();
			
			var url ='/home/' + fecha
			
			$(location).attr('href',url); 


			$("#fecha_admin").val(fecha);
			
		},
		createPrestamo:function(){

			var url='prestamo'

			axios.post(url,{
				valor: this.valor,
				articulo: this.articulo,
				valor_cuota: this.valor_cuota,
				valor_seguro: this.valor_seguro,
				plazo: this.plazo,
				estado: $(".estado").val(),
				cliente_id: $(".cliente_id").val(),
				cartera_id: $(".cartera_id").val(),
				cobrador_id: $(".cobrador_id").val(),
				pago_domingos: this.pago_domingos,
				valor_pagar:valor_a_pagar,

				

			}).then(response=>{

				this.getPrestamo();
				this.valor='';
				this.articulo='',
				this.valor_cuota='',
				this.valor_seguro='',
				this.plazo='',
				this.estado='',
				this.cliente_id='',
				this.clarteraid='',
				this.cobrador_id='',
				this.pago_domingos='',
				this.saldo='',
			
				this.errors=[]; 
				$('#create').modal('hide');
				$('#error').empty();
				toastr.success('Prestamo Guardado Correctamente'); 
			}).catch(error =>{
				this.errors=error.response.data
			});

		},	

		calcularInteres:function(action){
			
			if(action){
				valor_a_pagar=((this.valor*20)/100);
				valor_a_pagar= parseInt(valor_a_pagar)+ parseInt(this.valor);
				this.valor_pagar=valor_a_pagar;
			}else{
				valor_a_pagar=((this.fillprestamo.valor*20)/100);
				valor_a_pagar= parseInt(valor_a_pagar) + parseInt(this.fillprestamo.valor);
				this.fillprestamo.valor_pagar=valor_a_pagar;
			}
			
		},
		calcularCuota:function(action){
			
			if(action){
				cuota=valor_a_pagar/this.plazo;
				this.pago_domingos= cuota*4;
				this.valor_cuota=cuota;
				this.valor_seguro=cuota;
			}else{

				cuota=valor_a_pagar/this.fillprestamo.plazo;
				this.fillprestamo.pago_domingos= cuota*4;
				this.fillprestamovalor_cuota=cuota;
				this.fillprestamovalor_seguro=cuota;
			}	
		}
			
	}

});

const cobro = new Vue({
    el: '#cobros',
    
	data:{
		prestamos:[],
		prestamo_id:'',
		valor:'',
		efectivo_diario:0,
		errors:[],
		orden:{orden:''},
		id_prestamo:'',
		fillcobro:{valor:0,observacines:'',id:0}
	},
	mounted:function(){
		this.efectivo_diario=this.efectivo_diario+parseInt($(".estatic").val())
	},
	methods: {
		getPrestamo: function() {
			var url = '/cobro';
			axios.get(url).then(response => {
				this.prestamos = response.data
			});
		},
		editCobro: function(cobro) {
	
			this.fillcobro.valor=cobro.valor;
			this.fillcobro.observacines=cobro.observacines;
			this.fillcobro.id=cobro.id;
			
			$('#edit').modal('show');
			$('#error').empty();

		},
		updateCobro:function(id) {
			
			var url = '/cobro/' + id;
			axios.put(url,this.fillcobro).then(response=>{

				this.getPrestamo();
				fillcobro={
					'observacines':'',
					'valor':'',
					'id':'',
					
					
				};
			this.errors=[];
			$(".error").empty();
			$('#edit').modal('hide');
			toastr.success('Movimiento Actualizado Correctamente');
			}).catch(error=>{
				this.errors = error.response.data;
			});

		 },

		editPrestamo: function(prestamo) {
	
			this.orden.orden=prestamo.orden;
			this.id_prestamo=prestamo.id;
			
			$('#edit').modal('show');
			$('#error').empty();

		},
		ordenar:function(id) {
			var url = '/prestamo/' + id;
			axios.put(url,this.orden).then(response=>{

				orden={orden:''}
				
			this.errors=[];
				$('#edit').modal('hide');
				toastr.success('Prestamo actualizado Correctamente');
			}).catch(error=>{
				this.errors = error.response.data;
			});

		},
	
		PagarCuota:function(prestamo){

			var url='/cobro'
			var valor="#"+prestamo;
			valor_cuota=$(valor).val();
			this.efectivo_diario=parseInt(this.efectivo_diario)+parseInt(valor_cuota);
			

			axios.post(url,{
				valor: valor_cuota,
				prestamo_id: prestamo,
				

			}).then(response=>{

				//this.getPrestamo();
				this.valor='';
				this.prestamo_id='';
			
				this.errors=[];  
				
				$('#error').empty();
				toastr.success('Cobro  Guardado Correctamente'); 
				this.restarCuota(prestamo)
			}).catch(error =>{
				
			});

		},
		restarCuota:function(id){
			
			var valor_actual = parseInt($("#saldo"+id).val());
			var cuota_pagada= parseInt($("#"+id).val());
			valor_actual=(valor_actual<0)?valor_actual*-1:valor_actual
			var valor_pagar=valor_actual-cuota_pagada;
			$("#saldo"+id).val(valor_pagar);
			$("#saldo_th"+id).html(valor_pagar);

		},
		deleteCobro:function(cobro) {
			
			var urlDelete ='/cobro/'+cobro.id
			this.efectivo_diario=parseInt(this.efectivo_diario)+parseInt(cobro.valor);
			axios.delete(urlDelete).then(response=>{
				
				toastr.success('Movimiento eliminado eliminado correctamente');
			});
		}

	}

});

