import LeverClickListener from './LeverClickListener';

/**
 * ...
 */
enum Actions {
    SHOW = 'show',
    HIDE = 'hide',
}

/**
 * ...
 */
class Lever {
    /**
     * ...
     *
     * @type Element
     */
    private readonly element: Element;

    /**
     * ...
     *
     * @type string
     */
    private readonly action: string;

    /**
     * ...
     *
     * @type Array<string>
     */
    private readonly target: Array<string>;

    /**
     * The constructor.
     *
     * @param element { Element }
     */
    constructor(element: Element) {
        this.element = element;
        this.action = this.extractAction(element);
        this.target = this.extractTarget(element);
    }

    /**
     * ...
     *
     * @param element { Element }
     *   ...
     *
     * @return string
     */
    public extractAction(element: Element): string {
        const attribute = 'data-action';

        if (!element.hasAttribute(attribute)) {
            return Actions.SHOW;
        }

        const action: string = element.getAttribute(attribute);

        switch (action) {
            case Actions.SHOW:
            case Actions.HIDE:
                return action;
        }

        return null;
    }

    /**
     * ...
     *
     * @param element { Element }
     *  ...
     *
     * @return Array<string>
     */
    public extractTarget(element: Element): Array<string> {
        const attribute = 'data-target';

        if (!element.hasAttribute(attribute)) {
            return null;
        }

        const hash = element.getAttribute(attribute);

        if (hash === '') {
            return null;
        }

        const target = hash.split('.')
            .map((item: string) => item.trim())
            .filter((item: string) => item !== '');

        if (target.length === 0) {
            return null;
        }

        return target;
    }

    /**
     * ...
     *
     * @type boolean
     */
    public toShow(): boolean {
        return this.action === Actions.SHOW && this.target !== null;
    }

    /**
     * ...
     *
     * @type boolean
     */
    public toHide(): boolean {
        return this.action === Actions.HIDE;
    }

    /**
     * ...
     *
     * @type Array<string>
     */
    public getTarget(): Array<string> {
        return this.target;
    }

    /**
     * ...
     *
     * @type boolean
     */
    public setClickListener(listener: LeverClickListener): void {
        this.element.addEventListener('click', () => listener(this));
    }
}

export default Lever;
