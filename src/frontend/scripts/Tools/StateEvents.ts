import Events from '@tools/Events';

/**
 * The stage events.
 */
export default class StageEvents extends Events {
    /**
     * The showing event.
     *
     * @type Event
     */
    private readonly showing: CustomEvent;

    /**
     * The visible event.
     *
     * @type Event
     */
    private readonly visible: CustomEvent;

    /**
     * The hiding event.
     *
     * @type Event
     */
    private readonly hiding: CustomEvent;

    /**
     * The hidden event.
     *
     * @type Event
     */
    private readonly hidden: CustomEvent;

    /**
     * The constructor.
     *
     * @param element { Element }
     *   The DOM element.
     * @param entity { string }
     *   An entity name.
     * @param detail { object }
     *   An event object.
     */
    public constructor(element: Element, entity: string, detail: object = {}) {
        super(element, entity, detail);
        this.showing = this.createEvent('showing');
        this.visible = this.createEvent('visible');
        this.hiding = this.createEvent('hiding');
        this.hidden = this.createEvent('hidden');
    }

    /**
     * Dispatch show event.
     *
     * @return void
     */
    public show(): void {
        this.getElement().dispatchEvent(this.showing);
        setTimeout(() => this.getElement().dispatchEvent(this.visible), 300);
    }

    /**
     * Dispatch hide event.
     *
     * @return void
     */
    public hide(): void {
        this.getElement().dispatchEvent(this.hiding);
        setTimeout(() => this.getElement().dispatchEvent(this.hidden), 300);
    }
}
