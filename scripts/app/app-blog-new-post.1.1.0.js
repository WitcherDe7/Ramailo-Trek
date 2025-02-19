var toolbarOptions = [
  [{ 'header': [3, 2, 1, 4, 5, 6] }],
  ['bold', 'italic', 'underline', 'strike'],        
  ['blockquote', 'code-block'],               
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
  [{ 'script': 'sub'}, { 'script': 'super' }],      
  [{ 'indent': '-1'}, { 'indent': '+1' }], 
  ['image'],       
  [{ 'direction': 'rtl' }],                       
  [{ 'size': ['small', false, 'large', 'huge'] }],  
  [{ 'color': [] }, { 'background': [] }],          
  [{ 'font': [] }],                  // here
  
  [{ 'align': [] }],

];

var quill = new Quill('#editor-container', {
  modules: {
  imageResize: {
  	displaySize: true
  },
    toolbar: toolbarOptions
  },
  placeholder: 'Write your post here..',
  theme: 'snow',
  imageDrop: true,
  wordCount: {
    container: '#counter',
    unit: 'word'
  }

});

quill.on('text-change', function(delta, oldDelta, source) {
  $('#detail').val(quill.container.firstChild.innerHTML);
});
// var quill = new Quill('#editor-container', {
//     theme: 'snow',
//      modules: {
//         imageResize: {
//           displaySize: true
//         },
//        toolbar: [
//          [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
//          ['bold', 'italic', 'underline', 'strike'],
//          [{ 'color': [] }, { 'background': [] }], 
//          [{ 'align': [] }],
//          ['link', 'image'],
         
//          ['clean']  
//        ]
//     },
//     placeholder: 'Write your post here..',
//     theme: 'snow'
// });