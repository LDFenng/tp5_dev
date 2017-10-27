/**联动查询2版*/
(function($) {
	var select_num=0,
	default_option={
		method:'init',	
		contant:null,	
		url: null,
		type: 'POST',
		pid:'0',
		cache:false,
		dataType:'json',
		valField:'id',
		title:'title',
		addClass:'',
		attrInfo:false,
		pidField:'pid',
		nameField:'select_id',
		maxLevle:20
	},
	methods = {
		init: function() {  
			getLinkData()
		},
		changeSelect: function(_this) {
			var levle_num = _this.data('levle');
			//移除老节点
			$("select[id^='"+default_option.nameField+"_']").each(function(e){
				//清除重选后的 老节点
				if(levle_num<$(this).data('levle')){
					$('#select2-'+default_option.nameField+'_'+$(this).data('levle')+'-container').parents('.select2-container').remove();
					$(this).remove();
				}
			})
			select_num = $("select[id^='"+default_option.nameField+"_']").size()+1; //统计联动数量
			if(select_num>default_option.maxLevle){
				return false;	
			}			
			getLinkData();
			_this=null;
		},
		destroy: function() {
			return $(this).each(function() {
				var _this = $(this);
				_this.removeData('linkSelect');
			});
		}		
	};
	
	$.fn.linkSelect = function(options) {
        // 方法调用
		var that=this;
		default_option = $.extend({}, default_option, options);
		method=default_option.method;
        if (methods[method]) {
            return methods[method].apply(that, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error('Method' + method + 'does not exist on jQuery.linkSelect');
        }
        that=null;
	}
 
	function getLinkData(){
		if(default_option.url==null){
			$.error( '参数url不可为空！');
			return this;
		}
		if(default_option.contant==null){
			$.error( '容器不存在不可为空！');
			return this;
		}
		if(default_option.nameField==null){
			$.error( '表单name不可为空！');
			return this;
		} 
		getAjaxData(default_option.pid);
	};
	var changeField=function (list){
		for(info in list){
			for(key_word in list[info]){
				if(default_option.valField !=null && key_word==default_option.valField){
					list[info]['id']=list[info][key_word];
				}
				if(default_option.title !=null && key_word==default_option.title){
					list[info]['title']=list[info][key_word];
				}
			}
		}
		return list;
	};
	var getSelectData=function(list){
		var select_option="<option value='-1'>请选择</option>",
		data_info='',
		select_id=select_num+1;
		for(key in list){
			if(default_option.attr_info){
				data_info="data-info='"+list[key]+"'";
			}
			//由父级ID获取子级
			if(list[key][default_option.pidField]==default_option.pid){
				select_option+="<option value='"+list[key].id+"' "+data_info+">"+list[key].title+"</option>";
			}
		}
		$(default_option.contant).append('<select name="'+default_option.nameField+'[]" id="'+default_option.nameField+'_'+select_id+'" data-levle="'+select_id+'" class="'+default_option.addClass+'">'+select_option+'</select>');
		//$(".select2").select2();
		select_num=0;
	};
	var getAjaxData=function(){
		$.ajax({
			url:default_option.url,
			type:(default_option.type==null)?'POST':default_option.type,
			data:{pid:default_option.pid},
			cache:(default_option.data==null)?true:default_option.cache,	
			dataType: (default_option.dataType==null)?'json':default_option.dataType,
			success: function(data){
				if(data.code==1){
					var link_data=data['data_list'];
					if(default_option.id!=null || default_option.title!=null){
						var link_data=changeField(data.data_list);
					}
					getSelectData(link_data);
				}
			}     	
		})
	}

})(jQuery);