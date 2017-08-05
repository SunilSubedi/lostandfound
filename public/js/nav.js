    var vm = new Vue({
          el:'#nave',
          data:
          {
            subnav:false,
            catenav:false,
          },
          methods: {
            show()
            {
                this.subnav=!this.subnav;
            },
            showsub()
            {
              this.catenav=!this.catenav;
            }
          }
      });