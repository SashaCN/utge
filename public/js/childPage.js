// child page select

    document.querySelector('#child-page-select').addEventListener('mouseenter', e => {
        document.querySelector('#child-page-first-option').disabled = true;
    });

    document.querySelector('#child-page-select').addEventListener('mouseleave', e => {
        document.querySelector('#child-page-first-option').disabled = false;
    });

// photo show
    document.querySelector('#child-page-select').oninput = function(e){
        if (document.querySelector('#child-page-select').value != 'about_us') 
        {
            document.querySelector('.image-slide').innerHTML = '<label><input type="hidden" name="image" value=""></label><label><input type="file" name="image"></label>';
        }else{
            document.querySelector('.image-slide').innerHTML = '@lang("admin.update-image")';
        }
    }