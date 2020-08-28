<template>
<div id = "myproduct" class="container">

    <div class="row mt-2 mb-2">
            <div class="col-md-10">&nbsp;</div>
            <div class="col-md-2 text-right">
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#shoppingcart" style="font-size:24px;">
                    <i class="fa fa-shopping-cart"></i> <span class="badge badge-light">{{badge}}</span>
                </button>
                <div class="modal" id="shoppingcart">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Your Cart</h4>
                                <button class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped text-left" v-show="carts.length > 0">
                                    <thead>
                                        <tr>
                                            <th>Item ID</th>
                                            <th>Name</th>
                                            <th>Price per unit (RM)</th>
                                            <th>Quantity</th>
                                            <th>Subtotal (RM)</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                        <tr v-for="(cart,n) in carts" :key="n">
                                            <td>{{cart.id}}</td>
                                            <td>{{cart.name}}</td>
                                            <td class="text-center">{{formatNumber(cart.price) }}</td>
                                            <td width="100">
                                                <input type="text" readonly class="form-control" v-model="cart.amount">
                                            </td>
                                            <td>{{formatNumber(calc(cart.price,cart.amount))}}</td>
                                            <td width="60">
                                                <button @click="removeCart(n)" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-close"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <tbody>
                                    </tbody>
                                </table>
                                <p v-show="carts.length < 1" class="text-left"> No items added</p>
                            </div>
                            <div class="modal-footer">
                                Total Price: RM {{formatNumber(totalPrice)}} &nbsp;
                                <a href="/checkout" class="btn btn-primary ml-3" :class="{disabled: !carts.length}">CheckOut</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <h2 class="mb-3">Menu</h2>

    <button class="btn btn-default mb-3 btn-lg" 
        @click="goCategory()" v-show="selectedTab == 'series' || selectedTab =='one'">Go Back</button>

   <div class="row mt-5" v-show="selectedTab == 'category'">
            <div class="col-sm-3" v-for="teacat in teacats" >
                <div class="card mb-4" style="width: auto; height: 200px;" @click="goSeries(teacat.id)">
                    <div class="card card-header bg-light">
                        <h4>{{teacat.name}}</h4>
                    </div>
                    <div class="card card-body">
                        <img :src="'/storage/upload/menu/' + teacat.image" :alt="teacat.name" :title="teacat.name" width="100px" height="100px">
                    </div>
                    
                </div>
            </div>
    </div>

    <div v-show="selectedTab == 'series'" >
            <div class="row">
                <div class="col-sm-3" v-show="teaser.tea_cat_id == teacatid" 
                        v-for="(teaser, index) in teasers" :key="teaser.id" >
                    <div class="card mb-4" style="width: auto; height: 300px;">
                        <div class="card card-header bg-light">
                            <a href="#" @click="goOne(teaser.id)"><h4>{{teaser.name}}</h4></a>
                        </div>
                        <div class="card card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <img :src="'/storage/upload/menu/' + teaser.image" :alt="teaser.name" :title="teaser.name" width="110px" height="110px">
                                </div>
                                <div class="col-sm-6">
                                    <p><b>RM {{formatNumber(teaser.price)}}</b></p>
                                    <p><b>Ratings</b></p><i class="fa fa-star" v-for="rate in teaser.rate" style="font-size: 20px; color: #f9d71c;"></i><br><br>
                                    <p><b>{{teaser.quantity}} unit(s) in stock</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="number" v-model="itemquantity" 
                                    min="0" :max="teaser.quantity" :key="index" 
                                    style="width: 60px" class="mr-2" 
                                    :class="{blur: !teaser.quantity}">unit(s)
                            <button class="btn btn-info cart" 
                                    :class="{disabled: !teaser.quantity}" 
                                    :key="teaser.id"
                                    @click="addToCart(teaser)">Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-show="selectedTab == 'one'" >
            <div class="jumbotron">
                <div class="row m-3">
                    <div class="col-sm-6">
                        <h2>{{one.name}}</h2>
                        <img :src="'/storage/upload/menu/' + one.image" :alt="one.name" 
                        style="width: 370px; height:370px; display:block;">
                    </div>
                    <div class="col-sm-6">
                        <h3>Price</h3>
                        <p>RM {{formatNumber(one.price)}}</p><br>
                        <h3>Ratings </h3><i class="fa fa-star" style="font-size: 40px; color: #f9d71c;" v-for="rate in one.rate"></i><br><br>
                        <h3>Quantity in Stock</h3>
                        <p>{{one.quantity}} unit(s)</p><br>
                        <button class="btn btn-info cart btn-lg" 
                                :class="{disabled: !one.quantity}" 
                                :key="teaser.id"
                                @click="addToCart(one)">Add to Cart
                        </button>
                        <div class="form-group" style="width: 60px; font-size:24px;">
                            <label>Quantity</label>
                            <input type="number" v-model="itemquantity" 
                                min="0" :max="one.quantity" :key="one.id" 
                                class="mr-2" 
                                :class="{blur: !one.quantity}">
                        </div>
                        
                        
                    </div>
                </div>
                <p class="row m-3">{{one.description}}</p>
            </div>
        </div>
</div>
</template>

<style>
    .cart{
        float:right;
    }
</style>

<script>
export default{
    data(){
        return{
            teacats: [],
            teacat:{
                id:'',
                name: '',
                image:''
            },
            tab: ['category', 'series', 'one'],
            selectedTab: 'category',
            teasers: [],
            teaser:{
                id:'',
                tea_cat_id: '',
                name:'',
                image:'',
                description:'',
                price:'',
                quantity:'',
                rate:''
            },
            teacatid:'0',
            carts:[],
            cartadd:{
                id:'',
                name:'',
                price:'',
                amount:''
            },
            badge:'0',
            itemquantity:'1',
            totalPrice:'0',
            one:[]
        }
    },
    created(){
        this.viewTeaCat();
        this.viewTeaSer();
        this.viewCart();
    },

    methods:{
        viewTeaCat(){
            fetch('api/teacats')
            .then(res => res.json())
            .then(res => {
                this.teacats = res.data;
            })
            .catch(err => console.log(err));
        },
        goSeries(id){
            this.selectedTab = 'series';
            this.teacatid = id;
        },
        goCategory(){
            this.selectedTab = 'category';
        },
        goOne(id){
            this.selectedTab = 'one';
            console.log(id);
            fetch(`api/teasers/${id}`)
            .then(res => res.json())
            .then(res => {
                this.one = res.data;
            });
        },
        viewTeaSer(){
            fetch('api/teasers')
            .then(res => res.json())
            .then(res => {
                this.teasers = res.data;
            })
            .catch(err => console.log(err));
        },
        viewCart(){
            if(localStorage.getItem('carts')){
                this.carts = JSON.parse(localStorage.getItem('carts'));
                this.badge = this.carts.length;
                this.totalPrice = this.carts.reduce((total, item) => {
                    return total + item.amount * item.price;
                },0);
            }
            console.log(this.carts);
            console.log("Total Price: "+ this.totalPrice);
        },
        addToCart(teaser){
            this.cartadd.id = teaser.id;
            this.cartadd.name = teaser.name;
            this.cartadd.price = teaser.price;
            this.cartadd.amount = this.itemquantity;
            this.carts.push(this.cartadd);
            this.cartadd = {};
            
            this.storeCart();
        },
        storeCart(teaser){
            let parsed = JSON.stringify(this.carts);
            localStorage.setItem('carts', parsed);
            console.log("add "+this.carts);
            this.viewCart();
        },
        removeCart(tea){
            this.carts.splice(tea, 1);
            this.storeCart();
        },
        formatNumber(fnumber){
            let val = parseFloat(fnumber).toFixed(2);
            return val.toString();
        },
        calc(price, amount){
            return (price*amount);
        }
    }
}
</script>