<template>
    <div>

        <div class="create w-50 mx-auto">

            <div class="mb-3">
                Select Account Type
                <select class="custom-select" v-model="type">
                    <option value="customer">Customer</option>
                    <option value="seller">Seller</option>
                </select>
            </div>


            <div v-if=" type === 'customer' ">
                <h2>create a customer account</h2>
               <form action="/api/create/customer" method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Your Email Address" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter Your Address" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter Your Phone Number" required> 
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter Your Password" required>
                    </div>
                   <button type="submit" class="btn btn-primary btn-block"  >Submit</button>
                </form> 

            </div>

            <div v-else>
                <h2>create a seller account</h2>
               <form>
                    <div class="form-group">
                        <label for="name">Restaurant Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Your Restaurant Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Your Email Address" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter Your Address">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter Your Phone Number">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter Your Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form> 

            </div>

        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            type: 'customer'
        }
    },
    methods: {
        // createCustomer(event) {
        //     event.preventDefault();
        //     console.log('clicked' );
        // }
    }
}
</script>

<style lang="scss" scoped>

</style>