<template>
    <div>

        <div class="d-flex p-3">
            <router-link :to="`/${id}/customer/orders/new`" class="mr-3">
                <button type="button" class="btn btn-success">New Orders</button>
            </router-link>
    
            <router-link :to="`/${id}/customer/orders/completed`" class="mr-3">
                <button type="button" class="btn btn-secondary">Completed Orders</button>
            </router-link>
        </div>

        <router-view></router-view>
    </div>
</template>

<script>
export default {
    data() {
        return {
            id: this.$route.params.id,
        }
    }
}
</script>

<style lang="scss" scoped>

</style>