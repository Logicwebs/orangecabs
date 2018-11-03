$('.paypal').ClassyPaypal({
    
     
    
    // buynow, subscribe or donate
    
    type: 'buynow',
    
     
    
    // default, round, frame, double or square
    
    style: 'default',
    
     
    
    // payment button inner text/HTML
    
    innerHTML: 'pay for your ride',
    
     
    
    // target for PayPal checkout page
    
    checkoutTarget: '_self',    // delay submit after payment button was clicked
    
    delaySubmit: 1,
    
     
    
    // tooltip options
    
    tooltip: '',
    
    tooltipHide: 3000,
    
    tooltipTime: 300,
    
    tooltipDelay: 400,
    
    tooltipOffset: 15,
    
    // callback to modify PayPal checkout variables before submit
    
    beforeSubmit: false
 
    });
    