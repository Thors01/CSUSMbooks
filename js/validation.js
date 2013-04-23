(function() {
    "use strict";
    
    $(document).ready(function() {
        $("*[data-validation-pattern], *[data-validation-match]").each(function() {
            var $this = $(this);
            var pattern = $this.attr("data-validation-pattern");
            if (!pattern)
                pattern = ".*";
            
            var match = $this.attr("data-validation-match");
            var message = $this.attr("data-validation-message");
            if (!message)
                message = "Please check your input!";
        
            var regex = new RegExp(pattern);
            
            $this.focus(function() {
                $this.css({
                    borderColor: "",
                });
            });
            
            $this.blur(function() {                
                var $next = $this.next();
                if ($next.is(".validation-error"))
                    $next.remove();
                        
                var val = $this.val();
                var matches = true;
                if (match) {
                    var $element = $(match);
                    if ($element.val() !== val)
                        matches = false;
                }
                
                if (!regex.test(val) || !matches) {
                    $this.css({
                        borderColor: "#970000"
                    });
                    
                    var $span = $("<span></span>");
                    $span.addClass("validation-error");
                    $span.text(message);
                    $span.insertAfter($this);
                }
            });
        }).blur();
    });
})();