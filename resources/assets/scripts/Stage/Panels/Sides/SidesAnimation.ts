import Selector from '@scripts/Utilities/Selector';

/**
 * ...
 */
class SidesAnimation {
    /**
     * ...
     *
     * @type Element
     */
    private left: Element;

    /**
     * ...
     *
     * @type Element
     */
    private right: Element;

    /**
     * The constructor.
     */
    constructor() {
        this.left = Selector.element('side-left').get();
        this.right = Selector.element('side-right').get();
    }

    /**
     * ...
     *
     * @return void
     */
    public show() {
        this.left.classList.add('slide-panels__side-left_visible');
        this.left.classList.remove('slide-panels__side-left_hidden');
        this.right.classList.add('slide-panels__side-right_visible');
        this.right.classList.remove('slide-panels__side-right_hidden');
    }

    /**
     * ...
     *
     * @return void
     */
    public hide() {
        this.left.classList.add('slide-panels__side-left_hidden');
        this.left.classList.remove('slide-panels__side-left_visible');
        this.right.classList.add('slide-panels__side-right_hidden');
        this.right.classList.remove('slide-panels__side-right_visible');
    }
}

export default SidesAnimation;
