<template>
    <div class="mx-auto w-50 mt-4">
        <div>
            <div class="card">
            <div class="card-body">
                <h5 class="card-title"> {{ foodList[index].name }} </h5>
                <p class="card-text">₱ {{ foodList[index].price }}</p>
                <p class="card-text border-bottom">Available: {{ foodList[index].quantity }}</p>
                <h6 class="card-title"> {{ foodList[index].restaurant_name }} </h6>
                <p class="card-text">Managed by: {{ foodList[index].restaurant_owner }}</p>
                <p class="card-text">Located at: {{ foodList[index].restaurant_address }}</p>
                <button type="button" class="btn btn-success" @click="makeOrder" >Place Order</button>
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
            index: this.$route.params.index,
        }
    },
    methods: {
        makeOrder(event){
            event.preventDefault();

            const order = {
                'customer_id': this.id,
                'food_id': this.foodList[this.index].id,
                'amount': this.foodList[this.index].price,
                'completed': false
            }
            console.log(order);
            return
            axios.post('/api/order/store', order)
                 .then(res => this.$router.push(`/${this.id}/customer/foods`) )
                 .catch(err => console.log(err));
        }
    }
}
</script>

<style lang="scss" scoped>

</style>