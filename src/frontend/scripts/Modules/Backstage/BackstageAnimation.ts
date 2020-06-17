import Selector from '@tools/Selector';

/**
 * The animation of backstage.
 */
export default class BackstageAnimation {
    /**
     * The DOM element.
     *
     * @type Element
     */
    private readonly element: Element;

    /**
     * The constructor.
     */
    public constructor() {
        this.element = Selector.backstage();
    }

    /**
     * Shows the backstage.
     *
     * @return void
     */
    public show() {
        this.element.classList.add('slide-panels__backstage_showing');
        this.element.classList.remove('slide-panels__backstage_hidden');

        setTimeout(() => {
            this.element.classList.add('slide-panels__backstage_visible');
            this.element.classList.remove('slide-panels__backstage_showing');
        }, 300);
    }

    /**
     * Hides the backstage.
     *
     * @return void
     */
    public hide() {
        setTimeout(() => {
            this.element.classList.add('slide-panels__backstage_hiding');
            this.element.classList.remove('slide-panels__backstage_visible');
        }, 100);

        setTimeout(() => {
            this.element.classList.add('slide-panels__backstage_hidden');
            this.element.classList.remove('slide-panels__backstage_hiding');
        }, 400);
    }
}
