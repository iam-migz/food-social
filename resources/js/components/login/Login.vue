<template>
    <div class="w-50 mx-auto my-5">
        <h2>Login to your Account</h2>
        <form>
            <div class="form-group mt-4">
                Select Account Type
                <select class="custom-select" v-model="type">
                    <option value="customer">Customer</option>
                    <option value="seller">Seller</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
            <span class="form-text text-primary text-center text-decoration">
                <router-link to="/create">
                    Create an Account
                </router-link>
            </span>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            type: 'customer' //default select value
        }
    }
}
</script>

<style lang="scss" scoped>

</style>