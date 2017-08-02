@extends('layouts.admin_layout')
@section('style_sheet')
@endsection

@section('content')
<div id="List">
 <h1>Click the filter icon <small>(<i class="glyphicon glyphicon-filter"></i>)</small></h1>
    	<div class="row">
			<div class="col-md-9">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Category <span v-on:click="showSearch" class="pull-right">Search<i class="fa fa-filter pull-right"></i></span></h3>
					  
						</div>

					</div>
					<div class="panel-body">
						<input type="text" class="form-control"  v-model="search_value" placeholder="Search Category here...." v-show="search" v-on:keyup="searchCategory"/>
						 <span class="label label-danger" v-show="search_error">Search Not Found....</span>

					</div>
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th v-on:click="getSort('id')">#</th>
								<th v-on:click="getSort('name')">Categoy Name</th>
								<th v-on:click="getSort('created_at')">Created At</th>
								<th v-on:click="getSort('updated_at')">Updated At</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="categorie in categories">
								<td>@{{categorie.id}}</td>
								<td>@{{categorie.name}}</td>
								<td>@{{categorie.created_at}}</td>
								<td>@{{categorie.updated_at}}</td>
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
 	
  var vm = new Vue({
     el:'#List',
     data:
     {
     	categories:[],
     	search:false,
     	search_value:'',
     	search_error:false,

     },
     created:function()
     {
     	 this.getCategory();
     },
     methods:
     {
     	getCategory()
     	{
     		//alert('hello');
     		vm = this;
     		axios.get('/getcategory').then(function(response){
             vm.categories = response.data; 


     		});
     		console.log(this.categories);
     	},
        
        showSearch()
        {
          this.search = !this.search;
        },
     	getSort(value)
     	{
     		vm = this;
     		axios.get('/sortcategory/'+value
     			
    		).then(function(response){
                 vm.categories = response.data;
     		});
     	},
     	searchCategory()
     	{  
     	   this.search_error = false;
     		if(this.search_value=='')
     		{
     			this.getCategory();
     		}
           vm = this;
             axios.get('/searchcategory/'+vm.search_value).then(function(response){
            vm.categories = response.data;
            if(vm.categories=="")
            {
            	vm.search_error=true;
            }

           });

     	}

     },

  })

 </script>

@endsection