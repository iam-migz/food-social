<template>
    <div class="mt-3">
        <h2>Your Orders</h2>
        <div class="d-flex flex-wrap mt-3" v-if="ready">
            <div class="w-50" 
                v-for="(order, index) in orders"
                :key="index"
            >
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ order.food_name }}</h5>
                    <p class="card-text"> {{ order.restaurant_name }} </p>
                    <p class="card-text">₱ {{ order.food_price }}</p>
                    <router-link :to="`/${id}/customer/view/${index}`">
                        <button type="button" class="btn btn-danger">Cancel Order</button>
                    </router-link>
                </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    props: ['foodList'],
    data() {
        return {
            id: this.$route.params.id,
            orders: [],
            ready: false
        }
    },
    methods: {
        getOrders(){
            axios.get(`/api/customer/orders/${this.id}`)
                 .then(res => this.orders = res.data )
                 .catch(err => console.log(err));
        },
        getFoods(){
            this.orders.forEach((order, index) => {
                this.foodList.forEach(food => {
                    if ( order.food_id === food.id ){
                        this.orders[index] = {
                            ...this.orders[index],
                            'food_name': food.name,
                            'food_price': food.price,
                            'restaurant_name': food.restaurant_name 
                        }
                    }
                });
            });
            this.ready = true;
        }

    },
    created(){
        this.getOrders();

    },
    watch: {
        foodList(){
            this.getFoods();
        }
    }
}
</script>

<style lang="scss" scoped>

</style>