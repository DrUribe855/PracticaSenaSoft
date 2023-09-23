<template>
	<div class="col-12 card h-100 m-0">
		<div class="card-header d-flex align-items-center justify-content-between pb-0">
			<div class="col-12 card-title mb-0">
				<div class="m-0 p-0 row mb-2">
					<div class="col-10">
						<h5 class="m-0 h-100 pt-2 mb-2 me-2 text-dark text-uppercase"><b>{{ selected_store.store_name }}</b></h5>
					</div>
					<div class="col-2 row m-0 p-0 justify-content-end">
						<button class="btn btn-outline-secondary" @click="$parent.goToBack()">REGRESAR</button>
					</div>
				</div>
			</div>
		</div>
		<div class="card-body">
			<h4>LISTA DE ORDENES</h4>
			<table class="table table-bordered">
				<thead>
					<tr class="">
						<th class="bg-primary text-light col-1 text-center">ID</th>
						<th class="bg-primary text-light col-4 text-center">TOTAL</th>
						<th class="bg-primary text-light col-4 text-center">ESTADO</th>
						<th class="bg-primary text-light col-2 text-center">CANT. PROD.</th>
						<th class="bg-primary text-light col-1 text-center"></th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="order in selected_order">
						<td class="text-center p-1">{{ order.id }}</td>
						<td class="text-center p-1">{{ order.total }}</td>
						<td :class="[{'text-center p-1 text-danger':(order.status=='pendiente'), 'text-center p-1 text-primary':(order.status=='proceso'), 'text-center p-1 text-warning':(order.status=='entregada')}]">{{ order.status }}</td>
						<td class="text-center p-1">{{ order.order_product.length }}</td>
						<td class="text-center p-1">
							<button @click="detailProduct(order.order_product)" class="btn btn-primary px-2 p-1" data-bs-toggle="modal" data-bs-target="#exampleModal"> Det.Prod </button>
						</td>
					</tr>
				</tbody>
			</table>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">Detalle del producto que se pidio</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div :class="[{'col-12 m-0 pt-3 row flex justify-content-center':(list_product.length==1), 'col-12 m-0 pt-3 row':(list_product.length>1) }]">
								<div v-for="product_data in list_product" class= "col-12 col-sm-6 m-0 p-2 shadow-lg">
									<div class="col card h-100 m-0">
										<div class="card-header d-flex align-items-center justify-content-between pb-0">
											<div class="col-12 card-title mb-0">
												<h5 class="mb-3 me-2 text-dark text-uppercase text-center"><b>{{ product_data.product.product_name }}</b></h5> 
												Estado: <small :class="[{'text-primary':(product_data.product.status==1), 'text-danger':(product_data.product.status!=1)}]"><b>{{ (product_data.product.status==1)? 'ACTIVO' : 'INACTIVO'}}</b></small>
											</div>
										</div>
										<div class="card-body">
											<div class="d-flex justify-content-center align-items-center mt-2 mb-3" style="position: relative;">
												<div class="d-flex flex-column align-items-center">
													<h2 class="mb-0"> {{ product_data.quantity }} </h2> 
													<span>Total Productos</span>
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
    	</div>
    </div>
</template>

<script>
    export default {
        props:[ 'store' ],
        data(){
            return {
                selected_order: [],
                selected_store: {},
                list_product: [],
				detail_product: {}
				
            }
        },
        created(){
            this.selected_order = this.store.order,
            this.selected_store = this.store
        },
        methods:{
            detailProduct(list_product){
                this.list_product = list_product,
                console.log(this.list_product)
            }
        }
    }
</script>