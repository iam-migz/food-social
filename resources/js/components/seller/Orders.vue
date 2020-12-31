<template>
    <div>
        Seller's Orders
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
                 .then(res => this.orders = res.data )
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