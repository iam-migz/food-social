<template>
    <div>
        <div class="title">
            <h2 v-if="orders.length">{{ orders.length }} new order<span v-if="orders.length > 1">s</span> 
            </h2>
        </div>
        <div class="d-flex flex-wrap">

            <div class="w-50" 
                v-for="(order,index) in orders"
                :key="index"
            >
                <div class="card">
                    <div class="card-body">

                        <span class="card-subtitle text-muted d-inline-block">order detail </span> 
                        <h5 class="card-title">{{ order.food_name }}</h5>

                        <p class="card-subtitle">₱ {{ order.food_price }}.00</p>
                        <p class="card-subtitle border-bottom">{{ order.food_quantity }} Available Units</p>

                        
                        
                        <span class="card-subtitle text-muted d-inline-block mt-3">order by: </span> 
                        <h5 class="card-title  d-inline">{{ order.customer_name }}</h5>

                        <p class="card-subtitle mt-2">
                            <svg style="width: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                            {{ order.customer_address }}
                        </p>
                        <p class="card-subtitle">
                            <svg style="width: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            {{ order.customer_phone }}
                        </p>

                        <button type="button" class="btn btn-success mt-3" @click="updateOrder(order.order_id)">Complete Order</button>
                    </div>
                </div>

            </div>

            <div v-if="orders === undefined || orders == 0" class="mt-3 mx-auto">
                <h3><i>you have no new orders</i></h3>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            id: this.$route.params.id,
            orders: []
        }
    },
    methods: {
        getOrdersInformation(){
            axios.get(`/api/seller/orders/${this.id}`)
                 .then(res => this.orders = res.data.filter(order => !order.completed) )
                 .catch(err => console.log(err));
        },
        updateOrder(order_id){
            axios.put(`/api/order/${order_id}`)
                 .then(res => this.$router.go())
                 .catch(err => console.log(err));
        }
    },
    created(){
        this.getOrdersInformation();
    }

}
</script>

<style lang="scss" scoped>

</style>