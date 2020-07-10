/**
 * The state events.
 */
export default class Events {
    /**
     * The DOM element.
     *
     * @type Element
     */
    private readonly element: Element;

    /**
     * The name entity.
     *
     * @type string
     */
    private readonly entity: string;

    /**
     * The details.
     *
     * @type object
     */
    private readonly detail: object;

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
        this.element = element;
        this.entity = entity;
        this.detail = detail;
    }

    /**
     * Returns the DOM element.
     *
     * @return { Element }
     */
    protected getElement(): Element {
        return this.element;
    }

    /**
     * Returns the event.
     *
     * @param action { string }
     *   An action.
     *
     * @type { CustomEvent }
     */
    protected createEvent(action: string): CustomEvent {
        return new CustomEvent(`slide-panels__${this.entity}_${action}`, { bubbles: true, detail: this.detail });
    }
}
