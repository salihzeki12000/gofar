<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
<script>
          $.extend($.datepicker, {
          travelRanges: function (options) {
            
            var settings = {
              target: '.travel-dates',
              maxDateToBook: '30',
              dafaultDate: new Date(),
              populateFirst:true
            };

            $.extend(settings, options);

            $(settings.target).datepicker({
              minDate: '0',
              onSelect: function (selectedDate) {
                var self = this;
                if ($(self).is(settings.target+":first")) {
                  var newMaxDate = $(settings.target).datepicker('getDate');
                  newMaxDate.setDate($(this).datepicker('getDate').getDate() + settings.maxDateToBook);
                  $(settings.target+":last").datepicker("change", {
                     "minDate": $(settings.target).datepicker('getDate'),
                     "maxDate": newMaxDate
                   });
                }
              }
            });

            if (settings.populateFirst) {
              $(settings.target + ":first").datepicker('setDate', settings.dafaultDate);
            }
          }
        });

      $(document).ready(function(){
        <!-- $.datepicker.travelRanges({target:".rango1"}); -->
        $.datepicker.travelRanges({target:".rango2",populateFirst:false});
      });
    </script>

<form action="#">
  
  
 <fieldset>
   <legend>Rango 2</legend>
      <div>
    <label for="name">DE:</label>
    <input class="rango2" type="text" name="rango2_de" id="rango2_de" placeholder="yyyy-mm-dd" />
  </div>
  <div>
    <label for="name">A:</label>
    <input class="rango2" type="text" name="rango2_a" id="rango2_a" placeholder="yyyy-mm-dd" />
  </div>
 </fieldset>


  
  <div>
    <input type="submit" value="Submit" />
  </div>
</form>  