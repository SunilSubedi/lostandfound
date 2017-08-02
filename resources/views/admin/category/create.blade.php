@extends('layouts.admin_layout')
@section('content')
<div id="Cate">
<div class="alert alert-success" v-show="success">
  Successfully added
</div>
<div class="form-group">
{{Form::label('name','Category Name')}}
{{Form::text('name',null,['class'=>'form-control','required','v-model'=>'name'])}}<br>
{{Form::button('Add',['class'=>'btn btn-success','v-on:click'=>'addCategory'])}}
</div>
@endsection
@section('script')
<script type="text/javascript">
var app = new Vue({
  el:'#Cate',
  data:
  {
  	name:'',
  	success:false,
  },
  methods:
  {
    addCategory()
    {
    	if(this.name=="")
    	{
    		alert('input field required');

        }
    	else
    	{
    	   app = this;
    	 axios.post('/category',{
    	    name:this.name
     	  }).then(function(response){
             app.name="";
             app.success=true;
     	  });
     	 
      }
    }
  }


});	



</script>




@endsection