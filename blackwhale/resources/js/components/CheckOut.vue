<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <div class="card p-5">
                    <div class="card-header">
                        <h3>Order Summary</h3> 
                        <small style="float:right;">{{timestamp}}</small>
                    </div>
                    
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th width="100">Quantity</th>
                                    <th>Price(RM)</th>
                                    <th>Subtotal (RM)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(cart, index) in carts" :key="index">
                                    <td>{{cart.name}}</td>
                                    <td class="text-right">{{cart.amount}}</td>
                                    <td class="text-right">{{formatNumber(cart.price)}}</td>
                                    <td class="text-right">{{formatNumber(calc(cart.price, cart.amount))}}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right" style="border-bottom: 3px solid #000;border-top: 2px solid #000; font-weight: 900;">Total</td>
                                    <td class="text-right" style="border-bottom: 3px solid #000;border-top: 2px solid #000; font-weight: 900;">
                                        {{formatNumber(total)}}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>                  
        </div>

        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <div class="card p-5">
                    <h3 class="card-header">Customer Details</h3>
                    <small>This form is for pick up purpose.</small>
                    <div class="card card-body mt-3 p-3">
                        <form>
                            <div class=" form-group">
                                <label>Name</label>
                                <input type="text" v-model="customer.name" class="form-control" placeholder="Enter name" name="name" required autofocus>
                            </div>

                            <div class="form-group">
                                <label>Contact</label>
                                <input type="text" v-model="customer.contact" class="form-control" placeholder="Enter contact number" required name="contact">
                            </div>

                            <div class="form-group">
                                    <label>Pickup Time</label>
                                    <input type="datetime-local" v-model="customer.pickup_time" :min="new Date()" class="form-control" required  name="pickup_time">
                                    <!-- <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div> -->
                            </div>
    
                            <div class="form-group">
                                <label>Select Outlet</label>
                                <select class="form-control" v-model="outlet" required>
                                    <option selected disabled>--Select--</option>
                                    <option v-for="(outlet,index) in outlets" :value="outlet.id" :key="index">{{outlet.name}}</option>
                                </select>
                            </div>

                            <!-- <button class="btn btn-primary" @click.prevent="addCustomer()">Submit</button> -->

                            <div class="alert alert-danger" v-if="errors.length">
                                <strong>Please correct the following error(s):</strong>
                                <ul>
                                    <li v-for="error in errors">{{ error }}</li>
                                </ul>
                            </div>
                        </form>
                    </div>
                        
                    <button class="btn btn-info mt-5" style="float:right" @click="checkForm()">Checkout with FPX</button>

                </div>
                       
            </div>
        </div>
    </div>
</template>


<style>

</style>


<script>
export default{
    props:{
        userid: {
            type: Number,
            required: true
        }
    },
    data(){
        return{
            carts:[],   //id, name, price, amount
            total: '0',
            order:{
                id:'',
                order_id:'',
                user_id : '',
                outlet_id: '',
                customer_id: '',
                payment : '',
                tea_id : [],
                quantity : [],
                unit_price:[]
            },
            outlets:[],
            outlet:'',
            customer:{
                id:'',
                name:'',
                contact:'',
                pickup_time:''
            },
            cust_id:'',
            errors:[],
            timestamp: "",
            time:'',
            date:''
        }
    },
    created(){
        this.viewCart();
        this.viewOutlet();
        setInterval(this.getNow, 1000);
    },
    methods:{
        date_function: function () {

            var currentDate = new Date();
            console.log(currentDate);

            var formatted_date = new Date().toJSON().slice(0,10).replace(/-/g,'/');
            console.log(formatted_date);

        },
        viewCart(){
            if(localStorage.getItem('carts')){
                this.carts = JSON.parse(localStorage.getItem('carts'));
                this.total = this.carts.reduce((total, item) => {
                    return total += item.amount * item.price;
                },0);
            };
            
            //add tea_id and quantity
            for(var i=0; i<this.carts.length;i++){
                this.order.tea_id.push(this.carts[i].id);
                this.order.quantity.push(JSON.parse(this.carts[i].amount));
                this.order.unit_price.push(JSON.parse(this.carts[i].price));
            };
            console.log(this.order);
            
        },
        viewOutlet(){
            fetch('/api/outlets')
            .then(res => res.json())
            .then(res => {
                this.outlets = res.data;
            })
            .catch(err => console.log(err));
        },
        storeToOrdersTable(){
            this.order.user_id = this.userid;
            this.order.payment = 'fpx';
            this.order.outlet_id = this.outlet;
            fetch('api/orders', {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(this.order)
            })
            .then(res => res.json())
            .then(data => {
                alert("Order Added");
                this.order.id='',
                this.order.user_id='',
                this.order.order_id='',
                this.order.customer_id='',
                this.order.outlet_id='',
                this.order.payment='',
                this.order.tea_id=[],
                this.order.quantity=[],
                this.order.unit_price=[]
            })
            .catch(err => console.log(err));
            this.removeCart();
        },
        addCustomer(){
            fetch('api/customers', {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(this.customer)
            })
            .then(res => res.json())
            .then(data => {
                this.customer.id='',
                this.customer.name='',
                this.customer.contact='',
                this.customer.pickup_time=''
                console.log(this.order);
            })
            .catch(err => console.log(err));
            this.storeToOrdersTable();
        },
        formatNumber(fnumber){
            let val = fnumber.toFixed(2);
            return val.toString();
        },
        calc(price, amount){
            return price*amount;
        },
        checkForm(){
            this.errors = [];

            if(this.customer.name && this.customer.contact && this.customer.contact.length >= 9 && this.customer.pickup_time && this.outlet)
                this.addCustomer();

            if (!this.customer.name) {
                this.errors.push('Name required');
            }

            if (!this.customer.contact) {
                this.errors.push('Contact Number required');
            }
            else if (this.customer.contact.length < 9) {
                this.errors.push('Invalid Phone Number');
            }

            if (!this.customer.pickup_time) {
                this.errors.push('Pick Up Time required');
            }

            if (!this.outlet) {
                this.errors.push('Select an outlet to pickup');
            }
            
        },
        removeCart(){
            localStorage.removeItem('carts');
            window.location.href = 'http://blackwhale.my/cust';
        },
        getNow() {
            const today = new Date();
            const date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
            const time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
            const dateTime = date +' '+ time;
            this.timestamp = dateTime;
            this.date = today + time;
        }
    },

    mounted () {
      this.date_function()
    }
}
</script>