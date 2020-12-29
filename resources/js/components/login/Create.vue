<template>
    <div>

        <div class="create w-50 mx-auto">

            <div class="my-4">
                Select Account Type
                <select class="custom-select" v-model="type">
                    <option value="customer">Customer</option>
                    <option value="seller">Seller</option>
                </select>
            </div>

        <div class="alert alert-warning fade show hide" id="dissmiss">
            <strong>Ops,</strong> Please fill the form correctly
            <button type="button" class="btn btn-outline-dark" @click="dissmiss">
                <svg style="height: 20px; " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

            <div v-if=" type === 'customer' ">
                <h2>create a customer account</h2>
               <form id="customer">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter Your Username">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Your Email Address">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Enter Your Address">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" name="phone" placeholder="Enter Your Phone Number"> 
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Your Password">
                    </div>
                   <button type="submit" class="btn btn-primary btn-block" @click="createCustomer" >Submit</button>
                </form> 

            </div>

            <div v-else>
                <h2>create a seller account</h2>
               <form id="seller">
                    <div class="form-group">
                        <label for="name">Restaurant Name</label>
                        <input type="text" class="form-control" name="restaurant_name" placeholder="Enter Your Restaurant Name">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter Your Username">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Your Email Address">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Enter Your Address">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" name="phone" placeholder="Enter Your Phone Number">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Your Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" @click="createSeller">Submit</button>
                </form> 

            </div>

        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            type: 'customer' //default select value
        }
    },
    methods: {
        createCustomer(event) {
            event.preventDefault();
            const form = document.querySelector('form#customer');
            if ( form.username.value === '' ||
                 form.email.value === '' ||
                 form.address.value === '' ||
                 form.phone.value === '' ||
                 form.password.value === '' 
                ) {
                this.dissmiss();
                console.log('empty');
                return;
            }
            
            const customer = {
                "username": form.username.value,
                "email": form.email.value,
                "address": form.address.value,
                "phone": form.phone.value,
                "password": form.password.value
            }

            axios.post('/api/customer/store', customer)
                .then(res => this.$router.push('/'))
                .catch(err => console.log(err));
        },
        createSeller(event){
            event.preventDefault();
            const form = document.querySelector('form#seller');
            if ( form.username.value === '' ||
                 form.email.value === '' ||
                 form.address.value === '' ||
                 form.phone.value === '' ||
                 form.password.value === '' ||
                 form.restaurant_name.value === ''
                ) {
                this.dissmiss();
                console.log('empty');
                return;
            }
            
            const seller = {
                "restaurant_name": form.restaurant_name.value,
                "username": form.username.value,
                "email": form.email.value,
                "address": form.address.value,
                "phone": form.phone.value,
                "password": form.password.value
            }

            axios.post('/api/seller/store', seller)
                .then(res => this.$router.push('/') )
                .catch(err => console.log(err));

        },
        dissmiss(){
            document.querySelector('#dissmiss').classList.toggle('hide');
        }
    }
}
</script>

<style lang="scss" scoped>

.hide {
    display: none;
}
</style>