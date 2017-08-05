
<div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                
                <div class="navi">
                    <ul>
                        <li class="active"><a href="{{url('/admin')}}"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>
                        <li><a href="#" v-on:click="show"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Category</span></a>
                                <transition name="fade">
                                <div v-if="subnav">
                                <ul>
                                 <li class="sub"><a class="sub" href="{{route('category.index')}}"><span><small>List Category</small></span></a></li>
                                 <li class="sub"><a  class="sub"  href="{{route('category.create')}}"><span><small>Create Category</small></span></a></li>
                                 </ul>
                                </div>
                                </transition>
                                
                        </li>
                       <li><a href="#" v-on:click="showsub"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Sub Category</span></a>
                                <transition name="fade">
                                <div v-if="catenav">
                                <ul>
                                 <li class="sub"><a class="sub" href="{{ route('sub_category.index')}}"><span><small>List Sub Category</small></span></a></li>
                                 <li class="sub"><a  class="sub"  href="{{ route('sub_category.create')}}"><span><small>Create Sub Category</small></span></a></li>
                                 </ul>
                                </div>
                                </transition>
                                
                        </li>
                      
                    </ul>
                </div>
            </div>
