<template>
	<div>
		<div class="col-12 m-0 pt-3 row">
	    	<div v-if="visibilityStore" class="col-12 m-0 p-0 row">
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
		    						<h2 class="mb-0"> {{ store.order.length }} </h2> 
		    						<span>Total Ordenes</span>
		    					</div>
		    				</div>
		    				<div class="col-12 m-0 p-0 row justify-content-end">
		    					<button class="btn btn-info" @click="selectStore(store)">SELECCIONAR</button>
		    				</div>
		            	</div>
		            </div>
		        </div>
		    </div>
		    <detail-store v-if="!visibilityStore" :store="selected_store" ></detail-store>
	    </div>
	</div>

</template>
<script>
	import DetailStore from './DetailStore.vue';
	export default{
		props: [],
		components:{
			'detail-store': DetailStore,
		},
		data(){
			return {
				store_list: [],
				selected_store: {},
				visibilityStore: true,
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

					this.selected_store = this.store_list[0];
					this.selected_order = this.store_list[0].order;

				}).catch(error => {
					
					console.log("Error en axios: ");
					console.log( error );
					console.log( error.response );

				});
			},
			selectStore(store){
				this.selected_store = store;
				this.visibilityStore = false;
			},
			goToBack(){
				this.selected_store = {};
				this.visibilityStore = true;
			},
		},
	}
</script>