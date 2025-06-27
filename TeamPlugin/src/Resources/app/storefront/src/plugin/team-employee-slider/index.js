import Plugin from 'src/plugin-base.class';
import 'slick-carousel';

export default class TeamEmployeeSlider extends Plugin {
    init() {
        this._employeeSlider();
    }

    _employeeSlider() {
        this.el.slick({
            dots: true,
            arrows: true,
            slidesToShow: 1,
            slidesToScroll: 1
        });
    }
}
