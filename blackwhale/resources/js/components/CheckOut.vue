<template>
    
    <div class="container">
        <div class="header" style="position: sticky;">
            <div class="top">
                <p>Checkout</p>
            </div>
        </div>
        
        <div class="row mt-5" >
            <div class="col-md-8 offset-md-2">
                <div class="card p-5" style="border-radius: 10px; border: 5px solid #9c8c60">
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
                <div class="card p-5" style="border-radius: 10px; border: 5px solid #9c8c60">
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
                                <input type="datetime-local" v-model="customer.pickup_time" class="form-control" required  name="pickup_time" min="date">
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
                        
                    <!-- <button class="btn btn-info mt-5" style="float:right" @click="checkForm()">Checkout with FPX</button> -->
                    <div ref="paypal"></div>
                </div>
                       
            </div>
        </div>
    </div>
</template>


<style>
    body{
        background: #ffeaa7;
    }

    .header{
        z-index: 1111;
        top: 0;
    }
    .top{
        background: #ffc800;
        font-size: 3.75rem;
        text-align: center;
        position: relative;
        width: 100vw;
        left: -19.20%;
        padding: 10px 0;
    }
    .header p{
        text-transform: uppercase;  
        margin: 0;
        font-weight: bolder;
        color: #9c8c60;

    }


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
    
    mounted: function(){
        const script = document.createElement("script");
        script.src = "https://www.paypal.com/sdk/js?client-id=AcLvmayIWHe4njViaZ80b_Fyw0VWFvEt3_Hqh3T-ZYghmS31L_236ccB_Ez8MwUBQtKT7kRBON5jvmxl&currency=MYR";
        script.addEventListener("load", this.setLoaded);
        document.body.appendChild(script);
    },

    created(){
        this.viewCart();
        this.viewOutlet();
        setInterval(this.getNow, 1000);
    },

    

    methods:{
        setLoaded: function(){
            // console.log("Hello");
            window.paypal.Buttons({
                createOrder: (data, actions) => {
                    // This function sets up the details of the transaction, including the amount and line item details.
                    return actions.order.create({
                      purchase_units: [{
                        amount: {
                          currecy_code: "MYR",
                          value: this.total
                        }
                      }]
                    });
                  },
                  onApprove: (data, actions) => {
                        if(this.checkForm()){
                            this.addCustomer();
                            this.storeToOrdersTable();



                            return actions.order.capture().then(function(details){
                                alert('Transaction Completed By ' + details.payer.name.given_name);
                            });
                        }
                  },
                }).render(this.$refs.paypal);
        },

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
            fetch('/api/customers', {
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
            // this.storeToOrdersTable();
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

            if(this.customer.name && this.customer.contact && this.customer.contact.length >= 9 && this.outlet)
                // this.addCustomer();
                return true;

            if (!this.customer.name) {
                this.errors.push('Name required');
                return false;
            }

            if (!this.customer.contact) {
                this.errors.push('Contact Number required');
                return false;
            }
            else if (this.customer.contact.length < 9) {
                this.errors.push('Invalid Phone Number');
                return false;
            }

            if (!this.customer.pickup_time) {
                this.errors.push('Pick Up Time required');
                return false;
            }

            if (!this.outlet) {
                this.errors.push('Select an outlet to pickup');
                return false;
            }
            
        },
        removeCart(id){
            localStorage.removeItem('carts');
            if (window.open(`http://bw.my/pdf`, "_blank"))
            console.log("adc");
            window.location.href = 'http://bw.my/';
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

    // mounted () {
    //   this.date_function()
    // }
}
</script>