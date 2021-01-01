<template>
    <div class="mx-auto w-50 mt-4">
        <div>
            <div class="card">
            <div class="card-body">
                <h5 class="card-title"> {{ foodsInfo[index].name }} </h5>
                <p class="card-text">₱ {{ foodsInfo[index].price }}</p>
                <p class="card-text border-bottom">Available: {{ foodsInfo[index].quantity }}</p>
                <h6 class="card-title"> {{ foodsInfo[index].restaurant_name }} </h6>
                <p class="card-text">Managed by: {{ foodsInfo[index].restaurant_owner }}</p>
                <p class="card-text">Located at: {{ foodsInfo[index].restaurant_address }}</p>
                <button type="button" class="btn btn-success" @click="makeOrder" >Place Order</button>
            </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    props: ['foodsInfo'],
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
                'food_id': this.foodsInfo[this.index].id,
                'amount': this.foodsInfo[this.index].price,
                'completed': false
            }
 
            axios.post('/api/order/store', order)
                 .then(res => this.$router.push(`/${this.id}/customer/yourorders`) )
                 .catch(err => console.log(err));
        }
    }
}
</script>

<style lang="scss" scoped>

</style>