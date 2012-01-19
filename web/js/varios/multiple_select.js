	var fromBoxArray = new Array();
	var toBoxArray = new Array();
	var selectBoxIndex = 0;
	
	function moveSingleElement()
	{
		var selectBoxIndex = this.parentNode.parentNode.id.replace(/[^\d]/g,'');
		var tmpFromBox;
		var tmpToBox;
		if(this.tagName.toLowerCase()=='select'){			
			tmpFromBox = this;
			if(tmpFromBox==fromBoxArray[selectBoxIndex])tmpToBox = toBoxArray[selectBoxIndex]; else tmpToBox = fromBoxArray[selectBoxIndex];
		}else{
		
			if(this.value.indexOf('>')>=0){
				tmpFromBox = fromBoxArray[selectBoxIndex];
				tmpToBox = toBoxArray[selectBoxIndex];			
			}else{
				tmpFromBox = toBoxArray[selectBoxIndex];
				tmpToBox = fromBoxArray[selectBoxIndex];	
			}
		}
		
		for(var ns=0;ns<tmpFromBox.options.length;ns++){
			if(tmpFromBox.options[ns].selected){
				tmpFromBox.options[ns].selected = false;
				tmpToBox.options[tmpToBox.options.length] = new Option(tmpFromBox.options[ns].text,tmpFromBox.options[ns].value);
				
				for(var ns2=ns;ns2<(tmpFromBox.options.length-1);ns2++){
					tmpFromBox.options[ns2].value = tmpFromBox.options[ns2+1].value;
					tmpFromBox.options[ns2].text = tmpFromBox.options[ns2+1].text;
					tmpFromBox.options[ns2].selected = tmpFromBox.options[ns2+1].selected;
				}
				ns = ns -1;
				tmpFromBox.options.length = tmpFromBox.options.length-1;
											
			}			
		}
		
		
		var tmpTextArray = new Array();
		for(var ns=0;ns<tmpFromBox.options.length;ns++){
			tmpTextArray.push(tmpFromBox.options[ns].text + '___' + tmpFromBox.options[ns].value);			
		}
		tmpTextArray.sort();
		var tmpTextArray2 = new Array();
		for(var ns=0;ns<tmpToBox.options.length;ns++){
			tmpTextArray2.push(tmpToBox.options[ns].text + '___' + tmpToBox.options[ns].value);			
		}		
		tmpTextArray2.sort();
		
		for(var ns=0;ns<tmpTextArray.length;ns++){
			var items = tmpTextArray[ns].split('___');
			tmpFromBox.options[ns] = new Option(items[0],items[1]);
			
		}		
		
		for(var ns=0;ns<tmpTextArray2.length;ns++){
			var items = tmpTextArray2[ns].split('___');
			tmpToBox.options[ns] = new Option(items[0],items[1]);			
		}
	}
	
	function moveAllElements()
	{
		var selectBoxIndex = this.parentNode.parentNode.id.replace(/[^\d]/g,'');
		var tmpFromBox;
		var tmpToBox;		
		if(this.value.indexOf('>')>=0){
			tmpFromBox = fromBoxArray[selectBoxIndex];
			tmpToBox = toBoxArray[selectBoxIndex];			
		}else{
			tmpFromBox = toBoxArray[selectBoxIndex];
			tmpToBox = fromBoxArray[selectBoxIndex];	
		}
		
		for(var ns=0;ns<tmpFromBox.options.length;ns++){
			tmpToBox.options[tmpToBox.options.length] = new Option(tmpFromBox.options[ns].text,tmpFromBox.options[ns].value);
		}	
		
		tmpFromBox.options.length=0;
	}
	
	
	
	function createMovableOptions(fromBox,toBox,totalWidth,totalHeight,labelLeft,labelRight)
	{		
		fromObj = document.getElementById(fromBox);
		toObj = document.getElementById(toBox);
		fromObj.ondblclick = moveSingleElement;
		toObj.ondblclick = moveSingleElement;
		fromBoxArray.push(fromObj);
		toBoxArray.push(toObj);
		
		var parentEl = fromObj.parentNode;
		var parentDiv = document.createElement('DIV');

		parentDiv.className='multipleSelectBoxControl';
		parentDiv.id = 'selectBoxGroup' + selectBoxIndex;
		parentDiv.style.width = totalWidth + 'px';
		parentDiv.style.height = totalHeight + 'px';
		parentEl.insertBefore(parentDiv,fromObj);
		
		var subDiv = document.createElement('DIV');
		subDiv.style.width = (Math.floor(totalWidth/2) - 15) + 'px';
		fromObj.style.width = (Math.floor(totalWidth/2) - 15) + 'px';

		var label = document.createElement('SPAN');
		label.innerHTML = labelLeft;
		subDiv.appendChild(label);
		
		subDiv.appendChild(fromObj);
		subDiv.className = 'multipleSelectBoxDiv';
		parentDiv.appendChild(subDiv);
		
		
		var buttonDiv = document.createElement('DIV');
		buttonDiv.style.verticalAlign = 'middle';
		buttonDiv.style.paddingTop = (totalHeight/2) - 50 + 'px';
		buttonDiv.style.width = '30px';
		buttonDiv.style.textAlign = 'center';
		parentDiv.appendChild(buttonDiv);
		
		var buttonRight = document.createElement('INPUT');
		buttonRight.type='button';
		buttonRight.value = '>';
		buttonDiv.appendChild(buttonRight);	
		buttonRight.onclick = moveSingleElement;	
		
		var buttonAllRight = document.createElement('INPUT');
		buttonAllRight.type='button';
		buttonAllRight.value = '>>';
		buttonAllRight.onclick = moveAllElements;
		buttonDiv.appendChild(buttonAllRight);		
		
		var buttonLeft = document.createElement('INPUT');
		buttonLeft.style.marginTop='10px';
		buttonLeft.type='button';
		buttonLeft.value = '<';
		buttonLeft.onclick = moveSingleElement;
		buttonDiv.appendChild(buttonLeft);		
		
		var buttonAllLeft = document.createElement('INPUT');
		buttonAllLeft.type='button';
		buttonAllLeft.value = '<<';
		buttonAllLeft.onclick = moveAllElements;
		buttonDiv.appendChild(buttonAllLeft);
		
		var subDiv = document.createElement('DIV');
		subDiv.style.width = (Math.floor(totalWidth/2) - 15) + 'px';
		toObj.style.width = (Math.floor(totalWidth/2) - 15) + 'px';

		var label = document.createElement('SPAN');
		label.innerHTML = labelRight;
		subDiv.appendChild(label);
				
		subDiv.appendChild(toObj);
		parentDiv.appendChild(subDiv);		
		
		toObj.style.height = (totalHeight - label.offsetHeight) + 'px';
		fromObj.style.height = (totalHeight - label.offsetHeight) + 'px';
		selectBoxIndex++;
	}
	

    function selectItem()  {
        var obj = document.getElementById('toBox');
        for(var ns=0;ns<obj.options.length;ns++){
            obj.options[ns].selected = true;
        }
     }	