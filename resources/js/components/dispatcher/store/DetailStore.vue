<template>
	<div class="col-12 card h-100 m-0">
		<div class="card-header d-flex align-items-center justify-content-between pb-0">
			<div class="col-12 card-title mb-0">
				<div class="m-0 p-0 row mb-2">
					<div class="col">
						<h5 class="m-0 h-100 pt-2 mb-2 me-2 text-dark text-uppercase"><b>{{ selected_store.store_name }}</b></h5>
					</div>
					<div class="col row m-0 p-0 justify-content-end">
						<button class="btn btn-outline-secondary" @click="$parent.goToBack()">REGRESAR</button>
					</div>
				</div>
			</div>
		</div>
		<div class="card-body">
			<h4>LISTA DE ORDENES</h4>
			<table class="table table-bordered">
				<thead>
					<tr class="bg-primary text-light">
						<th class="col-1 text-center">ID</th>
						<th class="col-4 text-center">TOTAL</th>
						<th class="col-4 text-center">ESTADO</th>
						<th class="col-2 text-center">CANT. PROD.</th>
						<th class="col-1 text-center"></th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="order in selected_order">
						<td class="text-center p-1">{{ order.id }}</td>
						<td class="text-center p-1">{{ order.total }}</td>
						<td class="text-center p-1">{{ order.status }}</td>
						<td class="text-center p-1">{{ order.order_product.length }}</td>
						<td class="text-center p-1">
							<button class="btn btn-primary px-2 p-1" @click="openOrderModal(order)" data-bs-toggle="modal" data-bs-target="#exampleModal"> Det. </button>
						</td>
					</tr>
				</tbody>
			</table>
			<modal-order v-if="visibilityOrder" :order_product="order_product"></modal-order>
    	</div>
    	
    </div>
</template>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
	import modalOrder from './ModalOrder.vue';
	export default{
		props: [ 'store' ],
		components:{
			'modal-order': modalOrder
		},
		data(){
			return {
				selected_store: {},
				selected_order: [],
				order_product: [],
				visibilityOrder: false,
				myModal: {},
			}
		},
		created(){
			this.selected_store = this.store;
			this.selected_order = this.store.order;
		},
		methods: {
			openOrderModal(order){
				this.order_product = order.order_product;
				this.visibilityOrder = true;

				setTimeout(() => {
					this.myModal = new bootstrap.Modal(document.getElementById('modalStoreOrder'), {
					  keyboard: false,
					  backdrop: 'static',
					});
					this.myModal.show();
				},200);

			},
			closeOrderModal(){
				this.myModal.hide();
				setTimeout(() => {
					this.order_product = {};
					this.visibilityOrder = false;
				},200);
			}
		},
	}
</script>