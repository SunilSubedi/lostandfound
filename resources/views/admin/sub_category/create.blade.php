
@extends('layouts.admin_layout');
@section('content')
 <div id="Sub_Category">
 <?php $cate[0]="Please select...." ?>
  <div class="alert alert-success" v-show="success">
         Successfully added
   </div>
 @foreach($categories as $category)
   
    <?php $cate[$category->id]= $category->name ?>
    @endforeach
     <i class="label label-danger" v-show="error">Input value didnot match...</i>
     <br>
   {{Form::label('name','Name')}}
  {{Form::text('name',null,['class'=>'form-control','v-model'=>'name','required'])}}
  {{Form::label('category_id','Category')}}
  {{Form::select('category_id',$cate,$cate[0],['class'=>'form-control','v-model'=>'value'])}}<br>
  {{Form::button('Add',['class'=>'btn btn-success','v-on:click'=>'addSubCategory'])}}

</div>
@endsection
@section('script')
  <script type="text/javascript">
  	 
     var vm = new Vue({
            el:'#Sub_Category',
            data:
            {
              value:0,
              name:'',
              success:false,
              error:false,

            },
            methods:
            {
            	addSubCategory()
            	{
                   vm = this;
                   if(this.value==0 || this.name=="")
                   {
                     this.error=true;
                     return false;
                   }
                   else
                   {	
                     axios.post('/sub_category',{
                   	   'category_id':vm.value,
                   	   'name':vm.name,
                    }).then(function(response)
                    {
                   	vm.name='';
                   	vm.value=0;
                   	vm.success=true;
                   	vm.error=false;
                    });
                  }
            	}
            }

     });

  </script>
@endsection('script')  