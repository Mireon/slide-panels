import Panel from '@modules/Panels/Panel';

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
     * The panel object.
     *
     * @type Panel
     */
    private readonly panel: Panel;

    /**
     * The constructor.
     *
     * @param element { Element }
     *   The DOM element.
     * @param panel { Panel }
     *   The panel object.
     */
    public constructor(element: Element, panel: Panel) {
        this.element = element;
        this.panel = panel;
    }

    /**
     * Inserts a panel to inside.
     *
     * @return void
     */
    public inside(): void {
        this.element.classList.add('slide-panels__panel_showing');
        this.element.classList.add(`slide-panels__panel_${this.panel.getSide()}_slide-inside`);
        this.element.classList.remove(`slide-panels__panel_${this.panel.getSide()}_outside`);
        this.element.classList.remove('slide-panels__panel_hidden');

        setTimeout(() => {
            this.element.classList.add('slide-panels__panel_visible');
            this.element.classList.add(`slide-panels__panel_${this.panel.getSide()}_inside`);
            this.element.classList.remove('slide-panels__panel_showing');
            this.element.classList.remove(`slide-panels__panel_${this.panel.getSide()}_slide-inside`);
        }, 300);
    }

    /**
     * Retrieves a panel to outside.
     *
     * @return void
     */
    public outside(): void {
        this.element.classList.add('slide-panels__panel_hiding');
        this.element.classList.add(`slide-panels__panel_${this.panel.getSide()}_slide-outside`);
        this.element.classList.remove('slide-panels__panel_visible');
        this.element.classList.remove(`slide-panels__panel_${this.panel.getSide()}_inside`);

        setTimeout(() => {
            this.element.classList.add('slide-panels__panel_hidden');
            this.element.classList.add(`slide-panels__panel_${this.panel.getSide()}_outside`);
            this.element.classList.remove('slide-panels__panel_hiding');
            this.element.classList.remove(`slide-panels__panel_${this.panel.getSide()}_slide-outside`);
        }, 300);
    }
}
