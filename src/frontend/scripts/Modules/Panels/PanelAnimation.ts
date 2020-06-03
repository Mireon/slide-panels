import { Props } from '@tools/Props';

/**
 * The panel animation.
 */
export default class PanelAnimation {
    /**
     * The DOM element.
     *
     * @type Element
     */
    private readonly element: Element;

    /**
     * The panel side.
     *
     * @type Props.side
     */
    private readonly side: Props.side;

    /**
     * The constructor.
     *
     * @param element { Element }
     *   The DOM element.
     * @param side { Props.side }
     *   A side.
     */
    public constructor(element: Element, side: Props.side) {
        this.element = element;
        this.side = side;
    }

    /**
     * Inserts a panel to inside.
     *
     * @return void
     */
    public inside(): void {
        this.element.classList.add('slide-panels__panel_showing');
        this.element.classList.add(`slide-panels__panel-${this.side}_slide-inside`);
        this.element.classList.remove(`slide-panels__panel-${this.side}_outside`);
        this.element.classList.remove('slide-panels__panel_hidden');

        setTimeout(() => {
            this.element.classList.add('slide-panels__panel_visible');
            this.element.classList.add(`slide-panels__panel-${this.side}_inside`);
            this.element.classList.remove('slide-panels__panel_showing');
            this.element.classList.remove(`slide-panels__panel-${this.side}_slide-inside`);
        }, 300);
    }

    /**
     * Retrieves a panel to outside.
     *
     * @return void
     */
    public outside(): void {
        this.element.classList.add('slide-panels__panel_hiding');
        this.element.classList.add(`slide-panels__panel-${this.side}_slide-outside`);
        this.element.classList.remove('slide-panels__panel_visible');
        this.element.classList.remove(`slide-panels__panel-${this.side}_inside`);

        setTimeout(() => {
            this.element.classList.add('slide-panels__panel_hidden');
            this.element.classList.add(`slide-panels__panel-${this.side}_outside`);
            this.element.classList.remove('slide-panels__panel_hiding');
            this.element.classList.remove(`slide-panels__panel-${this.side}_slide-outside`);
        }, 300);
    }
}
