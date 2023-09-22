<template>
	<div>
	    <div class="col-12 m-0 pt-3 row">

	    	<div class="col-12 col-sm-6 col-lg-4 m-0 p-2" v-for="store in store_list">
	    		<div class="col card h-100 m-0">
	    			<div class="card-header d-flex align-items-center justify-content-between pb-0">
	    				<div class="col-12 card-title mb-0">
	    					<h5 class="m-0 me-2 text-dark text-uppercase text-center"><b>{{ store.store_name }}</b></h5> 
	    					Estado: <small :class="[{ 'text-danger':(store.status!=1), 'text-success':(store.status==1) } ]" ><b>{{ (store.status==1)? 'ACTIVO' : 'INACTIVO' }}</b> </small>
	    				</div>
	    			</div>
	    			<div class="card-body">
	    				<div class="d-flex justify-content-center align-items-center mt-2 mb-3" style="position: relative;">
	    					<div class="d-flex flex-column align-items-center">
	    						<h2 class="mb-0">0</h2> 
	    						<span>Total Ordenes</span>
	    					</div>
	    				</div>
	            	</div>
	            </div>
	        </div>

	    </div>
	</div>

</template>
<script>
	export default{
		props: [],
		data(){
			return {
				store_list: [],
			}
		},
		created(){
			this.getStores();
		},
		methods: {
			getStores(){

				axios.get('generalShow').then(res => {
					
					console.log("Respuesta del servidor: ");
					console.log(res);
					this.store_list = res.data.stores;

				}).catch(error => {
					
					console.log("Error en axios: ");
					console.log( error );
					console.log( error.response );

				});
			},
		},
	}
</script>