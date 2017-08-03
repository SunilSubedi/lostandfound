@extends('layouts.admin_layout')
@section('style_sheet')
 <style type="text/css">
  .fade-enter-active, .fade-leave-active 
 {
 	transition: opacity .5s;
 	 border-color:red;

 }
 .fade-enter,.fade-leave-to
 {
   opacity:0;

 }

 </style>

@endsection

@section('content')
<div id="ListSub">
 <h1>Click the filter icon <small>(<i class="glyphicon glyphicon-filter"></i>)</small></h1>
    	<div class="row">
			<div class="col-md-9">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Sub Category <span v-on:click="showSearch" class="pull-right">Search<i class="fa fa-filter pull-right"></i></span></h3>
					  
						</div>

					</div>
					<div class="panel-body">
					    <transition name="fade">
						<input type="text" class="form-control"  v-model="search_value" placeholder="Search Sub Category here...." v-if="search"/>
						 <span class="label label-danger" v-show="search_error">Search Not Found....</span>
						 </transition>

					</div>
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th v-on:click="getSort('id')">#</th>
								<th v-on:click="getSort('name')">Sub Category</th>
								<th v-on:click="getSort('category_id')">Categoy name</th>
								<th v-on:click="getSort('created_at')">Created At</th>
								<th v-on:click="getSort('updated_at')">Updated At</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="subcategorie in searchSubCategory"> 
								<td>@{{subcategorie.id}}</td>
								<td>@{{subcategorie.name}}</td>
								<td>@{{subcategorie.category.name}}</td>
								<td>@{{subcategorie.created_at}}</td>
								<td>@{{subcategorie.updated_at}}</td>
							</tr>
							
							
						</tbody>
					</table>
				</div>
			</div>
		</div>

</div>

@endsection
@section('script')
 <script type="text/javascript">
 	
  var vmm = new Vue({
     el:'#ListSub',
     data:
     {
     	subcategories:[],
     	search:false,
     	search_value:'',
     	search_error:false,

     },
    
     created:function()
     {
     	 this.getSubCategory();
     },
     methods:
     {
     	getSubCategory()
     	{
     		//alert('hello');
     		vm = this;
     		axios.get('/getsubcategory').then(function(response){
             vm.subcategories = response.data; 


     		});
     		//console.log(this.categories);
     	},
        
        showSearch()
        {
          this.search = !this.search;
        },
     	getSort(value)
     	{
     		vm = this;
     		axios.get('/sortsubcategory/'+value
     			
    		).then(function(response){
                 vm.subcategories = response.data;
     		});
     	},
     },
     computed:
     {
          
          searchSubCategory: function()
          {
          	vm = this;
          	return this.subcategories.filter((subcategorie)=>{
                   return subcategorie.name.toLowerCase().indexOf(vm.search_value.toLowerCase()) !== -1;
          	})
          }
     },

  })

 </script>

@endsection