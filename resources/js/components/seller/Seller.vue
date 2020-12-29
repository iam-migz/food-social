<template>
    <div>
        <h2>Welcome Seller,</h2>

        <ul>
            <li>
                <router-link to="/1/seller/add">
                    add food
                </router-link>
            </li>
            <li>
                <router-link to="/1/seller/orders">
                    view orders
                </router-link>
            </li>
            <li>
                <router-link to="/1/seller/list">
                    edit food list
                </router-link>
            </li>
        </ul>

        <router-view></router-view>
        
    </div>
</template>

<script>
export default {
    
}
</script>

<style lang="scss" scoped>

</style>