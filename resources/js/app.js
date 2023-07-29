import './bootstrap';
import Alpine from 'alpinejs';
import MathJax from 'mathjax'
import UIkit from 'uikit';
import Prism from 'prismjs';
import jQuery from 'jquery';

window.$ = jQuery;
window.Alpine = Alpine;
Alpine.start();

window.UIkit = UIkit;

window.Prism = Prism;

MathJax.init({
    loader: { load: ['input/tex', 'output/svg'] }
}).then((MathJax) => {
    const svg = MathJax.tex2svg('\\frac{1}{x^2-1}', { display: true });
    console.log(MathJax.startup.adaptor.outerHTML(svg));
}).catch((err) => console.log(err.message));
