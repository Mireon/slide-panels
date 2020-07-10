import Events from '@tools/Events';
import Lever from '@modules/Levers/Lever';
import { Props } from '@tools/Props';

/**
 * The lever events.
 */
export default class LeverEvents extends Events {
    /**
     * The show event.
     *
     * @type Event
     */
    private readonly show: CustomEvent;

    /**
     * The hide event.
     *
     * @type Event
     */
    private readonly hide: CustomEvent;

    /**
     * The constructor.
     *
     * @param element { Element }
     *   A DOM element.
     * @param lever { Lever }
     *   A lever.
     */
    public constructor(element: Element, lever: Lever) {
        super(element, 'lever', {
            'action': lever.getAction(),
            'panel': lever.getAction() === Props.action.SHOW ? lever.getTarget().getPanelKey() : null,
        });

        this.show = this.createEvent('show');
        this.hide = this.createEvent('hide');
    }

    /**
     * Dispatch show event.
     *
     * @type void
     */
    public onShow(): void {
        this.getElement().dispatchEvent(this.show);
    }

    /**
     * Dispatch hide event.
     *
     * @type void
     */
    public onHide(): void {
        this.getElement().dispatchEvent(this.hide);
    }
}
