<template>
    <div class="">
		<div v-if="visibilityOrders">
			<div class="row my-3">
				<div class="col-10">
					<h4>LISTA DE ORDENES</h4>
				</div>
				<div class="col-2">
					<button class="btn btn-success px-10 p-2" data-bs-toggle="modal" data-bs-target="#register"> Registrar Orden </button>
				</div>
			</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="bg-primary text-light col-1 text-center">ID</th>
						<th class="bg-primary text-light col-4 text-center">NOMBRE TIENDA</th>
						<th class="bg-primary text-light col-4 text-center">TOTAL</th>
						<th class="bg-primary text-light col-2 text-center">ESTADO</th>
						<th class="bg-primary text-light col-1 text-center"></th>
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
						<td class="text-center p-1">
							<button @click="edit_status(order.store, order)" class="btn btn-outline-danger px-2 p-1" data-bs-toggle="modal" data-bs-target="#edit"> Estado </button>
						</td>
					</tr>
				</tbody>
			</table>

			<!-- Info view modal -->
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

			<!-- Edit view modal -->
			<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">Cambiar estado</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form @submit.prevent="confirm_status(status)" >
								<div class="mb-3 row">
									<div class="col-1">
										<label class="form-label">id:</label>
									</div>
									<div class="col-11">
										<label class="font-weight-normal"> {{ order_status.id }} </label>
									</div>
								</div>
								<div class="mb-3 row">
									<div class="col-4">
										<label class="form-label">Nombre Tienda:</label>
									</div>
									<div class="col-8 p-0">
										<label class="font-weight-normal">{{ store_name.store_name }}</label>
									</div>
								</div>
								<div class="mb-3 row">
									<div class="col-2">
										<label class="form-label">Estado</label>
									</div>
									<div class="col-10">
										<label class="font-weight-normal">{{ order_status.status }}</label>
									</div>
									<select v-model="status" class="form-select " aria-label="Default select example">
										<option value="1">{{ (order_status.status=='pendiente')? 'proceso' : 'pendiente' }}</option>
										<option value="2">{{ (order_status.status=='proceso')? 'entregada' : (order_status.status=='entregada')? 'proceso' : 'entregada'}}</option>
									</select>
									<div id="emailHelp" class="form-text">Cambiar el estado de la orden.</div>
								</div>
								<button type="submit" class="btn btn-primary">Aceptar</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal register -->
			<div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Ordenes</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form @submit.prevent="register()">
								<div>
									<div class="mb-3">
										<label class="form-label"> Nombre Tienda </label>
										<select v-model="store_id" class="form-select" aria-label="Default select example">
											<option selected>Seleccione el nombre de la tienda</option>
											<option v-for="store in store_list" :value="store.id">{{ store.store_name }}</option>
										</select>
									</div>
									<div class="mb-3">
										<label class="form-label"> Nombre Producto </label>
										<select v-model="product_id" class="form-select" aria-label="Default select example">
											<option selected>Seleccione el nombre del producto</option>
											<option v-for="products in product" :value="products.id">{{ products.product_name }}</option>
										</select>
									</div>
									<div class="mb-3">
										<label class="form-label"> Cantidad </label>
										<input type="" class="form-control" v-model="amount">
									</div>
									<div class="mb-3">
										<label class="form-label"> Total </label>
										<input type="" class="form-control" v-model="total">
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
									<button type="submit" class="btn btn-primary">Aceptar</button>
								</div>
							</form>
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
				visibilityOrders: true,
				order_status: {},
				store_name: {},
				status: '',
				store_id: '',
				product_id: '',
				product: [],
				amount: '',
				total: '',
				store_list: [],

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
					this.product = res.data.product;
					this.store_list = res.data.store;
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
			},
			edit_status(store, order){
				this.order_status = order,
				this.store_name = store
			},
			confirm_status(status){
				if (status != null) {
					if (this.order_status.status == 'pendiente' && status == '1') {
					status = 'proceso';
					}else if (this.order_status.status == 'pendiente' && status == '2'){
						status = 'entregada';
					}else if (this.order_status.status == 'proceso' && status == '1') {
						status = 'pendiente';
					}else if (this.order_status.status == 'proceso' && status == '2') {
						status = 'entregada';
					}else if (this.order_status.status == 'entregada' && status == '1') {
						status = 'pendiente';
					}else if (this.order_status.status == 'entregada' && status == '2') {
						status = 'proceso';
					}

					this.order_status.status = status;
					axios.put(`${this.order_status.id}`, this.order_status).then(res => {
						console.log("Respuesta del servidor: ");
						console.log(res);
						

						console.log(this.selected_order);
						$('#edit').modal('hide');

						// Buscar la orden por id y 
						// Modificar el estado en el Order List
						var index = _.findIndex( this.order_list, function(o) { return o.id == res.data.order.id; });
						this.order_list[index].status = res.data.order.status;
                        this.order_list[index].store = res.data.store;



					}).catch(error => {
						console.log("Error en axios: ");
						console.log( error );
						console.log( error.response );
					});
				}else{
					console.log("Estado null");
				}
			},
			register(){
				const store_id = this.store_id;
				const product_id = this.product_id;
				const amount = this.amount;
				const total = this.total;
				axios.post('/Order/store', { store_id, product_id, amount, total }).then(res => {
					console.log("Respuesta del servidor");
					console.log(res.data);
					this.order_list = res.data.order_list;
					$('#register').modal('hide');
				}).catch(error => {
					console.log("Error en axios");
					console.log( error );
					console.log( error.response );
				});
			},
		},
	}
</script>