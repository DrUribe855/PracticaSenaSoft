<template>
    <div class="">
		<div v-if="visibilityOrders">
			<h4>LISTA DE ORDENES</h4>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="bg-primary text-light col-1 text-center">ID</th>
						<th class="bg-primary text-light col-4 text-center">NOMBRE TIENDA</th>
						<th class="bg-primary text-light col-4 text-center">TOTAL</th>
						<th class="bg-primary text-light col-2 text-center">ESTADO</th>
						<th class="bg-primary text-light col-1 text-center"></th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="order in order_list">
						<td class="text-center p-1">{{ order.id }}</td>
						<td class="text-center p-1">{{ order.store.store_name }}</td>
						<td class="text-center p-1">{{ order.total }}</td>
						<td :class="[{'text-danger':(order.status=='pendiente'), 'text-primary':(order.status=='proceso'), 'text-warning':(order.status=='entregada') }]" p-1>{{ order.status }}</td>
						<td class="text-center p-1">
							<button class="btn btn-outline-primary px-2 p-1" @click="store_detail(order.store, order.store.order)" data-bs-toggle="modal" data-bs-target="#exampleModal"> Detalle </button>
						</td>
					</tr>
				</tbody>
			</table>
			<div v-if="visibilityOrders" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">Información de la tienda</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="flex justify-content-center row">
								<div class="col-12 col-sm-10 m-0 p-2">
									<div class="col card h-100 m-0">
										<div class="card-header d-flex align-items-center justify-content-between pb-0">
											<div class="col-12 card-title mb-0">
												<h5 class="mb-3 me-2 text-dark text-uppercase text-center"><b>{{ selected_order.store_name }}</b></h5> 
												Estado: <small :class="[{'text-primary':(selected_order.status==1), 'text-danger':(selected_order.status!=1)}]"><b>{{ (selected_order.status==1)? 'ACTIVO' : 'INACTIVO'}}</b></small>
											</div>
										</div>
										<div class="card-body">
											<div class="d-flex justify-content-center align-items-center mt-2 mb-3" style="position: relative;">
												<div class="d-flex flex-column align-items-center">
													<h2 class="mb-0"> {{ orderZise.length }} </h2> 
													<span>Total Ordenes</span>
												</div>
											</div>
											<div class="col-12 m-0 p-0 row justify-content-end">
												<button class="btn btn-info" @click="selectOrder()">SELECCIONAR</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<datails-order v-if="!visibilityOrders" :store="selected_order"></datails-order>
    </div>
</template>
<script>
	import DatailOrder from "./DetailOrder.vue";
	export default{
		props: [],
		components:{
			'datails-order': DatailOrder,
		},
		data(){
			return {
				order_list: [],
				selected_order: {},
				orderZise: [],
				visibilityOrders: true
			}
		},
		created(){
			this.getOrder();
		},
		methods: {
			getOrder(){
				axios.get('generalShow').then(res => {
					console.log("Respuesta del servidor: ");
					console.log(res);
					this.order_list = res.data.order;

				}).catch(error => {
					
					console.log("Error en axios: ");
					console.log( error );
					console.log( error.response );

				});
			},
			store_detail(order, orderZise){
				this.selected_order = order,
				this.orderZise = orderZise
			},
			selectOrder(){
				$('#exampleModal').modal('hide');
				this.visibilityOrders = false
			},
			goToBack(){
				this.visibilityOrders = true,
				this.selected_order = {}
			}
		},
	}
</script>